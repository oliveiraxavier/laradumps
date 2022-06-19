<?php

namespace LaraDumps\LaraDumps\Payloads;

class ColorPayload extends Payload
{
    /**
     * @var string
     */
    public $color;

    public function __construct(string $color)
    {
        $this->color = $color;
    }

    public function type(): string
    {
        return 'color';
    }

    /** @return array<string> */
    public function content(): array
    {
        return [
            'color' => $this->color,
        ];
    }
}
