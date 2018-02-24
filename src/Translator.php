<?php

namespace IhorRadchenko\LaravelTranslator;

class Translator
{
    private $langFrom = 'ru';

    private $langTo = 'en';

    private $uri = 'https://translate.google.ru/translate_a/t';

    private $httpOptions = [
        'http' => [
            'user_agent' => 'Mozilla/5.0 (Windows NT 6.0; rv:26.0) Gecko/20100101 Firefox/26.0',
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded'
        ]
    ];

    public function translate(string $string): string
    {
        $queryData = $this->makeQueryData($string);
        $this->addHttpOption('content', $queryData);
        $response = file_get_contents($this->uri, false, stream_context_create($this->httpOptions));
        return json_decode($response);
    }

    public function langFrom(string $landFrom): self
    {
        $this->langFrom = $landFrom;
        return $this;
    }

    public function langTo(string $langTo): self
    {
        $this->langTo = $langTo;
        return $this;
    }

    private function addHttpOption(string $key, string $value): array
    {
        $this->httpOptions['http'][$key] = $value;
        return $this->httpOptions;
    }

    private function makeQueryData(string $string): string
    {
        return http_build_query([
            'client' => 'x',
            'q' => $string,
            'sl' => $this->langFrom,
            'tl' => $this->langTo
        ]);
    }
}