<?php

namespace IhorRadchenko\LaravelTranslator\Facades;

use Illuminate\Support\Facades\Facade;

class Transliterator extends Facade
{
    public static function getFacadeAccessor()
    {
        return "Translit";
    }
}