<?php namespace Akbsit\HelperJson;

class JsonHelper
{
    private ?array $arData;
    private ?string $sData;

    public static function make(): self
    {
        return new static();
    }

    public static function isJson(string $sData): bool
    {
        json_decode($sData, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return false;
        }

        return true;
    }

    public function data(mixed $data): self
    {
        $sType = gettype($data);
        switch ($sType) {
            case 'array':
                $this->arData = $data;
                break;
            case 'string':
                if (!static::isJson($data) && file_exists($data)) {
                    $data = file_get_contents($data);
                }

                $this->sData = $data;
                break;
        }

        return $this;
    }

    public function decode(): array
    {
        if (empty($this->sData) || !static::isJson($this->sData)) {
            return [];
        }

        return json_decode($this->sData, true);
    }

    public function encode(): string
    {
        if (empty($this->arData)) {
            return '';
        }

        return json_encode($this->arData, JSON_UNESCAPED_UNICODE);
    }
}
