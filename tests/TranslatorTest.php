<?php

namespace Tests;

use IhorRadchenko\LaravelTranslator\Translator;

class TranslatorTest extends TestCase
{
    private $translator;

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        $this->translator = new Translator;
        parent::__construct($name, $data, $dataName);
    }

    public function testTranslateFromRuToEn()
    {
        $translate = $this->translator->translate('Привет мир, меня зовут Иван');
        $this->assertEquals($translate, 'Hello world, my name is Ivan');
    }

    public function testTranslateFromRuToFr()
    {
        $translate = $this->translator
            ->langTo('fr')
            ->translate('Привет мир, меня зовут Иван');
        $this->assertEquals($translate, "Bonjour tout le monde, je m'appelle Ivan");
    }

    public function testTranslateFromEnToRu()
    {
        $translate = $this->translator
            ->langFrom('en')
            ->langTo('ru')
            ->translate('Hello world');
        $this->assertEquals($translate, "Привет мир");
    }
}