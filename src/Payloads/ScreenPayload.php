<?php

namespace LaraDumps\LaraDumps\Payloads;

class ScreenPayload extends Payload
{
    /**
     * @var string
     */
    public $screen;

    /**
     * @var bool
     */
    public $classAttr = false;

    public function __construct(string $screen, bool $classAttr = false)
    {
        $this->screen    = $screen;
        $this->classAttr = $classAttr;
    }

    public function type(): string
    {
        return 'screen';
    }

    /** @return array<string> */
    public function content(): array
    {
        /** @var array $config */
        $config    = config('laradumps.screen_btn_colors_map');
        $classAttr = ($this->classAttr) ? $config[$this->screen] : $config['default'];

        return [
            'screen'    => $this->screen,
            'classAttr' => $classAttr,
        ];
    }
}
