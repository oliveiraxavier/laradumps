<?php

namespace LaraDumps\LaraDumps\Payloads;

class LogPayload extends Payload
{
    /**
     * @var mixed[]
     */
    protected $value;

    public function __construct(array $value)
    {
        $this->value = $value;
    }

    public function type(): string
    {
        return 'log';
    }

    public function content(): array
    {
        return [
            'value' => $this->value,
        ];
    }
}
