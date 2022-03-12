# helper-json, [Packagist](https://packagist.org/packages/falbar/helper-json)

## Установка

Для установки пакета нужно:

```bash
composer require falbar/helper-json
```

## Примеры использования

1. Привести JSON строку к массиву:

```php
$sData = '{"key1":"value1","key2":"value2"}';

$arData = JsonHelper::make()->data($sData)->decode();
```

```text
array(2) {
  ["key1"]=> string(6) "value1"
  ["key2"]=> string(6) "value2"
}
```

2. Привести массив в JSON строку:

```php
$arData = [
    'key1' => 'value1',
    'key2' => 'value2',
];

$sData = JsonHelper::make()->data($arData)->encode();
```

```text
string(33) "{"key1":"value1","key2":"value2"}"
```
