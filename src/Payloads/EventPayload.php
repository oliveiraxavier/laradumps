<?php

namespace LaraDumps\LaraDumps\Payloads;

class EventPayload extends Payload
{
    /** @var object|mixed|null */
    protected $event = null;
    /**
     * @var string
     */
    protected $eventName;
    /**
     * @var mixed[]
     */
    protected $payload;

    public function __construct(string $eventName, array $payload)
    {
        $this->eventName = $eventName;
        $this->payload = $payload;
        if (class_exists($eventName)) {
            $this->event = $payload[0];
        }
    }

    public function content(): array
    {
        return [
            'name'              => $this->eventName,
            'event'             => $this->event ?: null,
            'payload'           => count($this->payload) ? $this->payload : null,
            'class_based_event' => !is_null($this->event),
        ];
    }

    public function type(): string
    {
        return 'events';
    }
}
