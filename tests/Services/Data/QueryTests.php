<?php

namespace Dayofr\Tests\Services\Data;

use Dayofr\Authentication\LoginData;
use Dayofr\Authentication\PasswordAuthentication;
use Dayofr\Client\Curl;
use Dayofr\Exception\SfdcAuthException;
use Dayofr\SalesforceClient;
use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

class QueryTests extends TestCase
{

    private static Curl $curl;

    /**
     * @beforeClass
     * @throws SfdcAuthException
     */
    public static function setUpClass()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../../');
        $dotenv->load();

        $loginData = (new LoginData())
            ->setClientId(getenv('sfdc_client_id'))
            ->setClientSecret(getenv('sfdc_client_secret'))
            ->setGrantType("password")
            ->setPassword(getenv('sfdc_password'))
            ->setUsername(getenv('sfdc_username'));

        self::$curl = new Curl(null);

        $c = new PasswordAuthentication(self::$curl);
        $c->doLogin($loginData);
    }

    public function testSelectSimple(): void
    {
        $q = new SalesforceClient(self::$curl);
        $r1 = $q->query("SELECT Id FROM Task");
        self::assertFalse($r1->isDone());

        $r2 = $q->query("SELECT Id FROM Task", true);
        self::assertTrue($r2->isDone());

        $t = $r2->getRecords()[0];

        self::assertEquals('Task', $t->attributes->type);
    }

    public function testSelectWithRelation(): void
    {
        $q = new SalesforceClient(self::$curl);
        $r = $q->query("SELECT Id,Name,Profile.Name FROM User WHERE Name = 'Security User' LIMIT 1");
        $u = $r->getRecords()[0];
        self::assertEquals('Analytics Cloud Security User', $u->Profile->Name);
    }

    public function testSelectWithCount(): void
    {
        $q = new SalesforceClient(self::$curl);
        $r = $q->query("SELECT LeadSource, COUNT(Name) FROM Lead GROUP BY LeadSource");
        $u = $r->getRecords()[0];
        self::assertIsNumeric($u->expr0);
    }

    public function testSelectWithCountAs(): void
    {
        $q = new SalesforceClient(self::$curl);
        $r = $q->query("SELECT LeadSource, COUNT(Name) c FROM Lead GROUP BY LeadSource");
        $u = $r->getRecords()[0];
        self::assertIsNumeric($u->c);
    }

    public function testExplain(): void
    {
        $q = new SalesforceClient(self::$curl);
        $r = $q->explain("SELECT LeadSource, COUNT(Name) c FROM Lead GROUP BY LeadSource");

        self::assertEquals('SELECT LeadSource, COUNT(Name) c FROM Lead GROUP BY LeadSource', $r->sourceQuery);
        self::assertIsArray($r->plans);
    }
}