<?php

namespace LaraDumps\LaraDumps\Payloads;

class QueriesPayload extends Payload
{
    /**
     * @var mixed[]
     */
    private $queries = [];
    /**
     * @var string
     */
    public $file = '';
    /**
     * @var string
     */
    public $line = '';
    /**
     * @var mixed[]
     */
    public $trace = [];
    public function __construct(array $queries = [], string $file = '', string $line = '', array  $trace = [])
    {
        $this->queries = $queries;
        $this->file = $file;
        $this->line = $line;
        $this->trace = $trace;
    }
    public function type(): string
    {
        return 'queries';
    }

    public function content(): array
    {
        return [
            'queries' => $this->queries,
            'file'    => $this->file,
            'line'    => $this->line,
        ];
    }
}
