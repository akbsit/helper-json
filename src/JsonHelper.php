<?php

declare(strict_types=1);

namespace Akbsit\HelperJson;

use Exception;

final class JsonHelper
{
    private const DEPTH = 512;

    private ?array $arData;
    private ?string $sData;

    public static function isJson(string $sData): bool
    {
        try {
            if (is_numeric($sData)) {
                throw new Exception;
            }

            json_decode($sData, true, self::DEPTH, JSON_THROW_ON_ERROR);
        } catch (Exception) {
            return false;
        }

        return true;
    }

    public static function make(): self
    {
        return new self();
    }

    public function data(mixed $data): self
    {
        $sType = gettype($data);
        switch ($sType) {
            case 'array':
                $this->arData = $data;
                break;
            case 'string':
                if (!self::isJson($data) && file_exists($data)) {
                    $data = file_get_contents($data);
                }

                $this->sData = $data;
                break;
        }

        return $this;
    }

    public function decode(): array
    {
        try {
            if (empty($this->sData) || !self::isJson($this->sData)) {
                throw new Exception;
            }

            return json_decode($this->sData, true, self::DEPTH, JSON_THROW_ON_ERROR);
        } catch (Exception) {
        }

        return [];
    }

    public function encode(): string
    {
        try {
            if (empty($this->arData)) {
                throw new Exception;
            }

            return json_encode($this->arData, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
        } catch (Exception) {
        }

        return '';
    }
}
