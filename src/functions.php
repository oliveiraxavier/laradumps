<?php

use Illuminate\Support\Str;
use Illuminate\View\Compilers\BladeCompiler;
use LaraDumps\LaraDumps\LaraDumps;
use LaraDumps\LaraDumps\Payloads\BladePayload;

if (!function_exists('ds')) {
    /**
     * @param mixed ...$args
     */
    function ds(...$args): LaraDumps
    {
        $backtrace   = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0];

        $notificationId = Str::uuid()->toString();
        $dump           = new LaraDumps($notificationId, '', $backtrace);

        if ($args) {
            foreach ($args as $arg) {
                $dump->write($arg);
            }
        }

        return $dump;
    }
}

if (!function_exists('phpinfo')) {
    function phpinfo(): LaraDumps
    {
        return ds()->phpinfo();
    }
}

if (!function_exists('dsd')) {
    /**
     * @param mixed ...$args
     */
    function dsd(...$args): void
    {
        ds($args)->die();
    }
}

if (!function_exists('ds1')) {
    /**
     * @param mixed ...$args
     */
    function ds1(...$args): LaraDumps
    {
        $backtrace   = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0];

        $notificationId = Str::uuid()->toString();
        $dump           = new LaraDumps($notificationId, '', $backtrace);

        if ($args) {
            foreach ($args as $arg) {
                $dump->write($arg)->toScreen('screen 1');
            }
        }

        return new LaraDumps($notificationId, '', $backtrace);
    }
}

if (!function_exists('ds2')) {
    /**
     * @param mixed ...$args
     */
    function ds2(...$args): LaraDumps
    {
        $backtrace   = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0];

        $notificationId = Str::uuid()->toString();
        $dump           = new LaraDumps($notificationId, '', $backtrace);

        if ($args) {
            foreach ($args as $arg) {
                $dump->write($arg)->toScreen('screen 2');
            }
        }

        return new LaraDumps($notificationId, '', $backtrace);
    }
}

if (!function_exists('ds3')) {
    /**
     * @param mixed ...$args
     */
    function ds3(...$args): LaraDumps
    {
        $backtrace   = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0];

        $notificationId = Str::uuid()->toString();
        $dump           = new LaraDumps($notificationId, '', $backtrace);

        if ($args) {
            foreach ($args as $arg) {
                $dump->write($arg)->toScreen('screen 3');
            }
        }

        return new LaraDumps($notificationId, '', $backtrace);
    }
}

if (!function_exists('ds4')) {
    /**
     * @param mixed ...$args
     */
    function ds4(...$args): LaraDumps
    {
        $backtrace   = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0];

        $notificationId = Str::uuid()->toString();
        $dump           = new LaraDumps($notificationId, '', $backtrace);

        if ($args) {
            foreach ($args as $arg) {
                $dump->write($arg)->toScreen('screen 4');
            }
        }

        return new LaraDumps($notificationId, '', $backtrace);
    }
}

if (!function_exists('ds5')) {
    /**
     * @param mixed ...$args
     */
    function ds5(...$args): LaraDumps
    {
        $backtrace   = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0];

        $notificationId = Str::uuid()->toString();
        $dump           = new LaraDumps($notificationId, '', $backtrace);

        if ($args) {
            foreach ($args as $arg) {
                $dump->write($arg)->toScreen('screen 5');
            }
        }

        return new LaraDumps($notificationId, '', $backtrace);
    }
}

if (!function_exists('dsBlade')) {
    /**
     * @param mixed $args
     */
    function dsBlade($args): void
    {
        $backtrace = collect(debug_backtrace())
            ->filter(function ($trace) {
                return $trace['function'] === 'render' && $trace['class'] === 'Illuminate\View\View';
            })->first();

        /** @var BladeCompiler $blade
        * @phpstan-ignore-next-line */
        $blade     = $backtrace['object'];
        $viewPath  = $blade->getPath();

        $backtrace      = [
            'file' => $viewPath,
            'line' => 1,
        ];

        $notificationId = Str::uuid()->toString();
        $ds             = new LaraDumps($notificationId, '', $backtrace);
        $ds->send(new BladePayload($args, $viewPath));
    }
}

if (!function_exists('dsq')) {
    function dsq(mixed ...$args): void
    {
        $backtrace   = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0];

        $notificationId = Str::uuid()->toString();
        $dump           = new LaraDumps($notificationId, '', $backtrace);

        if ($args) {
            foreach ($args as $arg) {
                $dump->write($arg, false);
            }
        }
    }
}
