<?php

namespace UntangleDev\LaravelNinoRule;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/laravel-nino-rule'),
        ]);

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang/', 'laravel-nino-rule');
    }
}
