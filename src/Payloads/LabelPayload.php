<?php

namespace LaraDumps\LaraDumps\Payloads;

class LabelPayload extends Payload
{
    /**
     * @var string
     */
    public $label;

    /**
     * ColorPayload constructor.
     * @param string $label
     */
    public function __construct(string $label)
    {
        $this->label = $label;
    }

    public function type(): string
    {
        return 'label';
    }

    public function content(): array
    {
        return [
            'label' => $this->label,
        ];
    }
}
