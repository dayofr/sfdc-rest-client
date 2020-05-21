<?php declare(strict_types=1);

namespace Dayofr\Client;

use Dayofr\Authentication\AuthenticationInterface;
use Dayofr\Authentication\LoginData;

interface ClientInterface
{
    /**
     * @param string $url
     * @param null|array<string> $params
     * @return mixed
     */
    public function get(string $url, array $params = null);

    public function doLogin(LoginData $loginData) : \stdClass;

    public function setAuthenticationInterface(?AuthenticationInterface $authenticationInterface): ClientInterface;
}
