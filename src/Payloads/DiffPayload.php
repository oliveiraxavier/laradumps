<?php

namespace LaraDumps\LaraDumps\Payloads;

class DiffPayload extends Payload
{
    /**
     * @var mixed
     */
    public $first;

    /**
     * @var mixed
     */
    public $second;

    /**
     * @var bool
     */
    public $col;

    /**
     * @param mixed $first
     * @param mixed $second
     */
    public function __construct($first, $second, bool $col)
    {
        $this->first  = $first;
        $this->second = $second;
        $this->col    = $col;
    }

    public function type(): string
    {
        return 'diff';
    }

    /** @return array<string, mixed> */
    public function content(): array
    {
        return [
            'first'  => $this->first,
            'second' => $this->second,
            'col'    => $this->col,
        ];
    }
}
