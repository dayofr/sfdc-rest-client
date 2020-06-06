<?php declare(strict_types=1);

namespace Dayofr\Responses\Limits;

class PermissionSets extends MaxRemaining
{
    private MaxRemaining $createCustom;

    public function __construct(\stdClass $res)
    {
        parent::__construct($res);
        $this->createCustom = new MaxRemaining($res->CreateCustom);
    }
}
