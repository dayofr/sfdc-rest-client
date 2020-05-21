<?php declare(strict_types=1);

namespace Dayofr\Services\Data;

use Dayofr\Client\ClientInterface;
use Dayofr\Responses\QueryResult;

class Query
{
    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $query
     * @param bool $all
     * @return QueryResult
     */
    public function get(string $query, bool $all = false): QueryResult
    {
        $res = $this->client->get('/services/data/v48.0/query', ['q' => $query]);

        $queryResult = new QueryResult($res);
        while ($all && !$queryResult->isDone()) {
            $res = $this->client->get($queryResult->getNextRecordsUrl());
            $queryResult->addResult($res);
        }

        return $queryResult;
    }

    /**
     * {
     * "plans" : [ {
     * "cardinality" : 13,
     * "fields" : [ ],
     * "leadingOperationType" : "TableScan",
     * "notes" : [ {
     * "description" : "Not considering filter for optimization because unindexed",
     * "fields" : [ "IsDeleted" ],
     * "tableEnumOrId" : "Account"
     * } ],
     * "relativeCost" : 3.816666666666667,
     * "sobjectCardinality" : 13,
     * "sobjectType" : "Account"
     * } ],
     * "sourceQuery" : "select id, name from account"
     * }
     *
     * @param string $query
     * @return mixed
     */
    public function explain(string $query)
    {
        return $this->client->get('/services/data/v48.0/query', ['explain' => $query]);
    }
}
