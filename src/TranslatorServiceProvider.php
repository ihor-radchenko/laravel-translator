<?php

namespace IhorRadchenko\LaravelTranslator;

use Illuminate\Support\ServiceProvider;

class TranslatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Translator::class, function () {
            return new Translator;
        });
        $this->app->bind("Translator", function () {
            return new Translator;
        });

        $this->app->bind(Transliterator::class, function () {
            return new Transliterator;
        });
        $this->app->bind("Translit", function () {
            return new Transliterator;
        });
    }
}
