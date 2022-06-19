<?php

namespace LaraDumps\LaraDumps\Support;

class IdeHandle
{
    /**
     * @var mixed[]
     */
    public $backtrace = [];
    public function __construct(array $backtrace = [])
    {
        $this->backtrace = $backtrace;
    }
    public function ideHandle(): array
    {
        $file = $this->backtrace['file'];
        $line = $this->backtrace['line'];

        $fileHandle = $this->makeFileHandler($file, $line);

        if (strpos($file, 'Laravel Kit') !== false) {
            $fileHandle       = '';
            $file             = 'Laravel Kit';
            $line             = '';
        }

        if (strpos($file, 'eval()') !== false) {
            $fileHandle       = '';
            $file             = 'Tinker';
            $line             = '';
        }

        $file = str_replace(base_path() . '/', '', strval($file));

        if (strpos($file, 'resources') !== false) {
            $file = str_replace('resources/views/', '', strval($file));
        }

        return [
            'handler' => $fileHandle,
            'path'    => $file,
            'line'    => $line,
        ];
    }

    public static function makeFileHandler(string $file, string $line): string
    {
        /** @var string $preferredIde */
        $preferredIde = config('laradumps.preferred_ide');
        /** @var array $handlers */
        $handlers      = config('laradumps.ide_handlers');

        $ide           = $handlers[$preferredIde] ?? $handlers['vscode'];

        if (!empty($ide['line_separator'])) {
            $line = $ide['line_separator'] . $line;
        }

        return $ide['handler'] . $file . $line;
    }
}
