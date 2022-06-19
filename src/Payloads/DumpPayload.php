<?php

namespace LaraDumps\LaraDumps\Payloads;

class DumpPayload extends Payload
{
    /**
     * @var string
     */
    public $dump;
    /**
     * @var mixed
     */
    public $originalContent = null;
    /**
     * @param mixed $originalContent
     */
    public function __construct(string $dump, $originalContent = null)
    {
        $this->dump = $dump;
        $this->originalContent = $originalContent;
    }
    public function type(): string
    {
        return 'dump';
    }

    public function content(): array
    {
        return [
            'dump'            => $this->dump,
            'originalContent' => $this->originalContent,
        ];
    }
}
