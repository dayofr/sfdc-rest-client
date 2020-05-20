<?php

namespace Dayofr\Authentication;

class LoginData
{
    public string $grantType;
    public string $clientId;
    public string $clientSecret;
    public string $username;
    public string $password;
    public string $baseUrl = 'https://login.salesforce.com/';

    public function setGrantType(string $grantType): LoginData
    {
        $this->grantType = $grantType;
        return $this;
    }

    public function setClientId(string $clientId): LoginData
    {
        $this->clientId = $clientId;
        return $this;
    }

    public function setClientSecret(string $clientSecret): LoginData
    {
        $this->clientSecret = $clientSecret;
        return $this;
    }

    public function setUsername(string $username): LoginData
    {
        $this->username = $username;
        return $this;
    }

    public function setPassword(string $password): LoginData
    {
        $this->password = $password;
        return $this;
    }

    public function setBaseUrl(string $baseUrl): LoginData
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }


}