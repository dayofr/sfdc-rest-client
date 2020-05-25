<?php

namespace Dayofr;

use Dayofr\Client\ClientInterface;
use Dayofr\Responses\LimitsResult;
use Dayofr\Responses\QueryResult;

class SalesforceClient
{
    private ClientInterface $client;
    private string $version = '48.0';

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function query(string $query, bool $all = false): QueryResult
    {
        $res = $this->client->get("/services/data/v{$this->version}/query", ['q' => $query]);

        $queryResult = new QueryResult($res);
        while ($all && !$queryResult->isDone()) {
            $res = $this->client->get($queryResult->getNextRecordsUrl());
            $queryResult->addResult($res);
        }

        return $queryResult;
    }

    public function explain(string $query) : \stdClass
    {
        $response =  $this->client->get("/services/data/v{$this->version}/query", ['explain' => $query]);
        return json_decode($response);
    }

    public function limits() : LimitsResult
    {
        $response =  $this->client->get("/services/data/v{$this->version}/limits");
        return new LimitsResult($response);
    }
}
