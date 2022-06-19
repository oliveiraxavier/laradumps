<?php

namespace LaraDumps\LaraDumps\Support;

use Illuminate\Support\Str;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;

class Dumper
{
    /**
     * @param mixed $arguments
     */
    public static function dump($arguments): string
    {
        $varCloner = new VarCloner();

        $dumper = new HtmlDumper();

        $htmlDumper = (string) $dumper->dump($varCloner->cloneVar($arguments), true);

        return Str::cut($htmlDumper, '<pre ', '</pre>');
    }
}
