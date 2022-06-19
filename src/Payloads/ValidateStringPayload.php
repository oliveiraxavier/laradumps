<?php

namespace LaraDumps\LaraDumps\Payloads;

class ValidateStringPayload extends Payload
{
    /**
     * @var string
     */
    protected $content;

    /**
     * @var string
     */
    public $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function type(): string
    {
        return 'validate';
    }

    /** @return array<string> */
    public function content(): array
    {
        return [
            'type'    => $this->type,
            'content' => $this->content ?: '',
        ];
    }

    public function setContent(string $content): void
    {
        $this->content = strtolower($content);
    }
}
