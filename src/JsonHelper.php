<?php namespace Falbar\HelperJson;

/**
 * Class JsonHelper
 * @package Falbar\HelperJson
 */
class JsonHelper
{
    private ?array $arData;
    private ?string $sData;

    /* @return static */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @param string|array|null $data
     *
     * @return $this
     */
    public function data($data): self
    {
        $sType = gettype($data);
        switch ($sType) {
            case 'array':
                $this->arData = $data;
                break;
            case 'string':
                $this->sData = $data;
                break;
        }

        return $this;
    }

    /* @return array */
    public function decode(): array
    {
        if (empty($this->sData)) {
            return [];
        }

        $arData = json_decode($this->sData, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return [];
        }

        return $arData;
    }

    /* @return string */
    public function encode(): string
    {
        if (empty($this->arData)) {
            return '';
        }

        return json_encode($this->arData, JSON_UNESCAPED_UNICODE);
    }
}
