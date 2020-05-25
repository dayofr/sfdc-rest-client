<?php

namespace Dayofr\Responses\Limits;

class MaxRemaining
{
    protected int $max;
    protected int $remaining;

    public function __construct(\stdClass $res)
    {
        $this->max = $res->Max;
        $this->remaining = $res->Remaining;
    }

    public function getMax(): int
    {
        return $this->max;
    }

    public function getRemaining(): int
    {
        return $this->remaining;
    }
}
