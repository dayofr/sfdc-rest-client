<?php


namespace Dayofr\Authentication;

use Dayofr\Client\ClientInterface;
use Dayofr\Exception\SfdcAuthException;

class PasswordAuthentication implements AuthenticationInterface
{
    private string $accessToken;

    private string $instanceUrl;

    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param LoginData $loginData
     * @throws SfdcAuthException
     */
    public function doLogin(LoginData $loginData) : void
    {
        $ret = $this->client->doLogin($loginData);

        if (isset($ret->error)) {
            throw new SfdcAuthException($ret->error);
        }
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
