<?php

namespace LaraDumps\LaraDumps;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\{ServiceProvider, Str};
use LaraDumps\LaraDumps\Commands\{CheckCommand, InitCommand};
use LaraDumps\LaraDumps\Observers\{LivewireObserver, LogObserver, QueryObserver};
use LaraDumps\LaraDumps\Payloads\QueryPayload;

class LaraDumpsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadConfigs();
        $this->createDirectives();
        $this->bootMacros();
        $this->bootObservers();

    }
    
    private function bootMacros(): void
    {
        Str::macro('cut', function (string $str, string $start, string $end) {
            $arr = explode($start, $str);
            if (is_array($arr) && !empty($arr[1])) {
                $arr = explode($end, $arr[1]);

                if (is_array($arr) && !empty($arr[0])) {
                    return '<pre ' . $arr[0] . '</pre>';
                }
            }

            return '';
        });
    }
    
    private function bootObservers(): void
    {
        app(LogObserver::class)->register();
        app(QueryObserver::class)->register();
        app(LivewireObserver::class)->register();
    }
    
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/laradumps.php',
            'laradumps'
        );

        $file = __DIR__ . './functions.php';
        if (file_exists($file)) {
            require_once($file);
        }

        $this->app->singleton(QueryObserver::class);

        Builder::macro('ds', function () {
            $backtrace   = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);

            $backtrace = collect($backtrace)
                ->filter(function ($trace) {
                    if (!empty($trace['file'])) {

                        $file = $trace['file'];
    
                        return !Str::contains($file, 'vendor');
                    }
                });

            $ds = new LaraDumps('', '', (array) $backtrace->first());
            /** @phpstan-ignore-next-line  */
            $ds->send(new QueryPayload($this));

            return $this;
        });
    }

    private function loadConfigs(): void
    {
        $this->publishes([
            __DIR__ . '/../config/laradumps.php' => config_path('laradumps.php'),
        ], 'laradumps-config');
    }

    private function createDirectives(): void
    {
        Blade::directive('ds', function ($args) {
            return "<?php dsBlade($args); ?>";
        });
    }
}
