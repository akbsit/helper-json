# helper-json, [Packagist](https://packagist.org/packages/falbar/helper-json)

## Install

To install package, you need run command:

```bash
composer require falbar/helper-json
```

## Examples

1. Check string:

```php
$sData = '{"key1":"value1","key2":"value2"}';

$bFlag = JsonHelper::isJson($sData);
```

2. JSON string to array:

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

3. JSON file to array

```php
$sPath = 'data.json'; // in file string {"key1":"value1","key2":"value2"}

$arData = JsonHelper::make()->data($sPath)->decode();
```

```text
array(2) {
  ["key1"]=> string(6) "value1"
  ["key2"]=> string(6) "value2"
}
```

4. Array to JSON string:

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
