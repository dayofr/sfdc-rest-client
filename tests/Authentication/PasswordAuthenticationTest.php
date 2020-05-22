<?php

namespace Dayofr\Tests\Authentication;

use Dayofr\Authentication\LoginData;
use Dayofr\Authentication\PasswordAuthentication;
use Dayofr\Client\Curl;
use Dayofr\Exception\SfdcAuthException;
use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

class PasswordAuthenticationTest extends TestCase
{
    /**
     * @beforeClass
     */
    public static function setUpClass()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();
    }

    public function testValidLogin() : void
    {
        $loginData = (new LoginData())
            ->setClientId(getenv('sfdc_client_id'))
            ->setClientSecret(getenv('sfdc_client_secret'))
            ->setGrantType("password")
            ->setPassword(getenv('sfdc_password'))
            ->setUsername(getenv('sfdc_username'));

        $curl = new Curl(null);

        $c = new PasswordAuthentication($curl);
        try {
            $c->doLogin($loginData);
        } catch (SfdcAuthException $e) {
        }

        self::assertEquals('https://eu31.salesforce.com', $c->getInstanceUrl());
        self::assertNotNull($c->getAccessToken());
    }

    public function testInvalidLogin() : void
    {
        $loginData = (new LoginData())
            ->setClientId(getenv('sfdc_client_id'))
            ->setClientSecret(getenv('sfdc_client_secret'))
            ->setGrantType("password")
            ->setPassword('invalid@test.local')
            ->setUsername(getenv('sfdc_username'));

        $curl = new Curl(null);

        $c = new PasswordAuthentication($curl);

        self::expectException(SfdcAuthException::class);
        $c->doLogin($loginData);
    }
}
