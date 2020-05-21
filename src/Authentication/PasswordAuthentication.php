<?php


namespace Dayofr\Authentication;

use Dayofr\Client\ClientInterface;

class PasswordAuthentication implements AuthenticationInterface
{
    private string $accessToken;

    private string $instanceUrl;

    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function doLogin(LoginData $loginData) : void
    {
        $ret = $this->client->doLogin($loginData);

        $this->accessToken = $ret->access_token;
        $this->instanceUrl = $ret->instance_url;

        $this->client->setAuthenticationInterface($this);
    }

    public function getAccessToken() : string
    {
        return $this->accessToken;
    }

    public function getInstanceUrl() : string
    {
        return $this->instanceUrl;
    }
}
