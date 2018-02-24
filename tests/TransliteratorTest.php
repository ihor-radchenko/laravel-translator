<?php

namespace Tests;

use IhorRadchenko\LaravelTranslator\Transliterator;

class TransliteratorTest extends TestCase
{
    private $transliterator;

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        $this->transliterator = new Transliterator;
        parent::__construct($name, $data, $dataName);
    }

    public function testTranslit()
    {
        $this->assertEquals($this->transliterator->ru2lat('Привет мир'), 'privet-mir');
        $this->assertEquals($this->transliterator->ru2lat('Привет мир', '%'), 'privet%mir');
        $this->assertEquals($this->transliterator->ru2lat('Меня зовут Иван'), 'menya-zovut-ivan');
    }
}