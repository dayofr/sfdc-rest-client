<?php declare(strict_types=1);

namespace Dayofr\Client;

use Dayofr\Authentication\AuthenticationInterface;
use Dayofr\Authentication\LoginData;

// todo handle error
class Curl implements ClientInterface
{
    private ?AuthenticationInterface $authenticationInterface;

    public function __construct(?AuthenticationInterface $authenticationInterface)
    {
        $this->authenticationInterface = $authenticationInterface;
    }

    public function setAuthenticationInterface(?AuthenticationInterface $authenticationInterface): ClientInterface
    {
        $this->authenticationInterface = $authenticationInterface;
        return $this;
    }

    public function get(string $url, array $params = null) {
        if($this->authenticationInterface === null) {
            return "";
        }
        $request_headers = [
            'Authorization: Bearer ' . $this->authenticationInterface->getAccessToken(),
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);

        if($params !== null && is_array($params)) {
            $params = http_build_query($params);
        } else {
            $params = "";
        }
        $url = "{$this->authenticationInterface->getInstanceUrl()}{$url}?{$params}";

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }

    public function doLogin(LoginData $loginData) : \stdClass
    {
        $login_data = [
            'grant_type' => $loginData->grantType,
            'client_id' => $loginData->clientId,
            'client_secret' => $loginData->clientSecret,
            'username' => $loginData->username,
            'password' => $loginData->password,
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $loginData->baseUrl.'/services/oauth2/token');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $login_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $ret = curl_exec($ch);

        curl_close($ch);

        if(is_bool($ret)) {
            return new \stdClass();
        }

        return json_decode($ret);
    }

}