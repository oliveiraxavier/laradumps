<?php

namespace LaraDumps\LaraDumps\Payloads;

use Illuminate\Database\Query\Builder;

class QueryPayload extends Payload
{
    /**
     * @var \Illuminate\Database\Query\Builder
     */
    protected $query;
    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    public function content(): array
    {
        $toSql = str_replace(['?'], ['\'%s\''], $this->query->toSql());
        $toSql = vsprintf($toSql, $this->query->getBindings());

        return [
            'sql' => $toSql,
        ];
    }

    public function type(): string
    {
        return 'query';
    }
}
