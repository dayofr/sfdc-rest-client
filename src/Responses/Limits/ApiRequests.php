<?php declare(strict_types=1);

namespace Dayofr\Responses\Limits;

class ApiRequests extends MaxRemaining
{
    /**
     * @var array<MaxRemaining>
     */
    private array $apps;

    public function __construct(\stdClass $res)
    {
        parent::__construct($res);

        foreach ($res as $k => $v) {
            if ($k === 'Max' || $k === 'Remaining') {
                continue;
            }
            $this->apps[$k] = new MaxRemaining($v);
        }
    }

    public function getApp(string $app) : MaxRemaining
    {
        return $this->apps[$app];
    }
}
