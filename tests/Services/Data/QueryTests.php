<?php

namespace Dayofr\Tests\Services\Data;

use Dayofr\Authentication\LoginData;
use Dayofr\Authentication\PasswordAuthentication;
use Dayofr\Client\Curl;
use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

class QueryTests extends TestCase
{
    /**
     * @beforeClass
     */
    public static function setUpClass() {
        $dotenv = Dotenv::createImmutable(__DIR__.'/../../../');
        $dotenv->load();
    }

    public function testSelectSimple(): void
    {
        $loginData = (new LoginData())
            ->setClientId(getenv('sfdc_client_id'))
            ->setClientSecret(getenv('sfdc_client_secret'))
            ->setGrantType("password")
            ->setPassword(getenv('sfdc_password'))
            ->setUsername(getenv('sfdc_username'));

        $curl = new Curl(null);

        $c = new PasswordAuthentication($curl);
        $c->doLogin($loginData);

        $q = new Query($curl);
        $r1 = $q->get("SELECT Id FROM Task");
        self::assertFalse($r1->isDone());

        $r2 = $q->get("SELECT Id FROM Task", true);
        self::assertTrue($r2->isDone());

        $t = $r2->getRecords()[0];

        self::assertEquals('Task', $t->attributes->type);
    }

    public function testSelectWithRelation(): void
    {
        $loginData = (new LoginData())
            ->setClientId(getenv('sfdc_client_id'))
            ->setClientSecret(getenv('sfdc_client_secret'))
            ->setGrantType("password")
            ->setPassword(getenv('sfdc_password'))
            ->setUsername(getenv('sfdc_username'));

        $curl = new Curl(null);

        $c = new PasswordAuthentication($curl);
        $c->doLogin($loginData);

        $q = new Query($curl);
        $r = $q->get("SELECT Id,Name,Profile.Name FROM User WHERE Name = 'Security User' LIMIT 1");
        $u = $r->getRecords()[0];
        self:self::assertEquals('Analytics Cloud Security User', $u->Profile->Name);
    }
}