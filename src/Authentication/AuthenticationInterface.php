<?php declare(strict_types=1);

namespace Dayofr\Authentication;

interface AuthenticationInterface
{

    public function getAccessToken() : string;

    public function getInstanceUrl() : string;
}