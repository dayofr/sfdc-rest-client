<?php

namespace Dayofr\Responses;

class QueryResult
{
    private int $totalSize;
    private bool $done;
    /**
     * @var array<\stdClass>
     */
    private array $records;
    private string $nextRecordsUrl;


    public function __construct(string $response)
    {
        $res = json_decode($response);
        $this->totalSize = $res->totalSize;
        $this->done = $res->done;
        $this->records = $res->records;
        $this->nextRecordsUrl = $res->nextRecordsUrl ?? '';
    }

    public function addResult(string $response) : void {
        $res = json_decode($response);
        $this->done = $res->done;
        $this->records = array_merge($this->records, $res->records);
        $this->nextRecordsUrl = $res->nextRecordsUrl ?? '';
    }

    public function getTotalSize(): int
    {
        return $this->totalSize;
    }

    public function isDone(): bool
    {
        return $this->done;
    }

    /**
     * @return array<\stdClass>
     */
    public function getRecords(): array
    {
        return $this->records;
    }

    public function getNextRecordsUrl(): string
    {
        return $this->nextRecordsUrl;
    }

}