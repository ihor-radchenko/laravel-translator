# Laravel translator

Пакет предназначен для перевода текста и транслитерации русских и украинских символов.

## Установка
С помощью [Composer](https://getcomposer.org/)-а:
``` 
composer require ihor-radchenko/laravel-tranlator
```
Для версий Laravel ниже 5.5, в ```config/app.php``` нужно добавить провайдера в массив ```providers```:
```
IhorRadchenko\LaravelTranlator\TranslatorServiceProvider::class,
```
и в массив ```aliases```:
```
'Translator' => IhorRadchenko\LaravelTranlator\Facades\Translator::class,
'Translit' => IhorRadchenko\LaravelTranlator\Facades\Transliterator::class,
```
## Использование
1. С помощью IoC-контейнера:
```php
use IhorRadchenko\LaravelTranslator\Translator;

public function index(Translator $translator)
{
	$translator->translate('Привет мир, меня зовут Иван'); // Hello world, my name is Ivan
	$translator
		->langTo('fr')
	    ->translate('Привет мир, меня зовут Иван'); // Bonjour tout le monde, je m'appelle Ivan
	$translator
		->langFrom('en')
        ->langTo('ru')
        ->translate('Hello world'); // Привет мир
}
```
```php
use IhorRadchenko\LaravelTranslator\Transliterator;

public function index(Transliterator $translit)
{
	$translit->ru2lat('Привет мир'); // privet-mir
	$translit->ru2lat('Привет мир', '%'); // privet%mir
}
```
2. С помощью фасада:
```php
Translator::translate('Привет мир, меня зовут Иван'); // Hello world, my name is Ivan
Translator::langTo('fr')
	->translate('Привет мир, меня зовут Иван'); // Bonjour tout le monde, je m'appelle Ivan
Translator::langFrom('en')
	->langTo('ru')
    ->translate('Hello world'); // Привет мир
```
```php
Translit::ru2lat('Привет мир'); // privet-mir
Translit::ru2lat('Привет мир', '%'); // privet%mir
```
