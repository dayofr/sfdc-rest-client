<?php

namespace Dayofr\Tests\Services\Data;

use Dayofr\Authentication\LoginData;
use Dayofr\Authentication\PasswordAuthentication;
use Dayofr\Client\Curl;
use Dayofr\Exception\SfdcAuthException;
use Dayofr\SalesforceClient;
use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

class LimitsTests extends TestCase
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

    public function testLimits(): void
    {
        $q = new SalesforceClient(self::$curl);
        $r1 = $q->limits();
        self::assertEquals(40960, $r1->getAnalyticsExternalDataSizeMB()->getMax());
    }
}