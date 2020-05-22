<?php

namespace Dayofr\Tests\Services\Data;

use Dayofr\Authentication\LoginData;
use Dayofr\Authentication\PasswordAuthentication;
use Dayofr\Client\Curl;
use Dayofr\Exception\SfdcAuthException;
use Dayofr\Services\Data\Query;
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
        $q = new Query(self::$curl);
        $r1 = $q->get("SELECT Id FROM Task");
        self::assertFalse($r1->isDone());

        $r2 = $q->get("SELECT Id FROM Task", true);
        self::assertTrue($r2->isDone());

        $t = $r2->getRecords()[0];

        self::assertEquals('Task', $t->attributes->type);
    }

    public function testSelectWithRelation(): void
    {
        $q = new Query(self::$curl);
        $r = $q->get("SELECT Id,Name,Profile.Name FROM User WHERE Name = 'Security User' LIMIT 1");
        $u = $r->getRecords()[0];
        self:
        self::assertEquals('Analytics Cloud Security User', $u->Profile->Name);
    }
}