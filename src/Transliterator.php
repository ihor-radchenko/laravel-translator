<?php

namespace IhorRadchenko\LaravelTranslator;

class Transliterator
{
    private $rules;

    public function __construct()
    {
        $this->rules = include 'rules.php';
    }

    public function ru2lat(string $string, string $separator = '-'): string
    {
        $result = $this->translit($this->toLowerCase($string));
        return $this->replaceSpacesWithSeparator($result, $separator);
    }

    private function toLowerCase(string $string): string
    {
        return mb_strtolower(trim($string));
    }

    private function translit(string $string): string
    {
        return strtr($string, $this->rules);
    }

    private function replaceSpacesWithSeparator(string $string, string $separator): string
    {
        $result = preg_replace("/[^a-zA-Z0-9_]/i", $separator, $string);
        $result = preg_replace("/\-+/i", $separator, $result);
        return $result;
    }
}