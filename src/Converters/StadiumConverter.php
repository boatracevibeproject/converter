<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Stadium\Stadium;
use BVP\Trimmer\Trimmer;

/**
 * @author shimomo
 */
class StadiumConverter extends BaseConverter implements StadiumConverterInterface
{
    /**
     * @psalm-param int|string|null $value
     * @psalm-return int<1, 24>|null
     *
     * @param int|string|null $value
     * @return int|null
     */
    #[\Override]
    public function convertToStadiumNumber(int|string|null $value): ?int
    {
        /** @psalm-var int<1, 24>|null */
        return $this->search($value)['number'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return non-empty-string|null
     *
     * @param int|string|null $value
     * @return string|null
     */
    #[\Override]
    public function convertToStadiumName(int|string|null $value): ?string
    {
        /** @psalm-var non-empty-string|null */
        return $this->search($value)['name'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return non-empty-string|null
     *
     * @param int|string|null $value
     * @return string|null
     */
    #[\Override]
    public function convertToStadiumShortName(int|string|null $value): ?string
    {
        /** @psalm-var non-empty-string|null */
        return $this->search($value)['short_name'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return non-empty-string|null
     *
     * @param int|string|null $value
     * @return string|null
     */
    #[\Override]
    public function convertToStadiumHiraganaName(int|string|null $value): ?string
    {
        /** @psalm-var non-empty-string|null */
        return $this->search($value)['hiragana_name'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return non-empty-string|null
     *
     * @param int|string|null $value
     * @return string|null
     */
    #[\Override]
    public function convertToStadiumKatakanaName(int|string|null $value): ?string
    {
        /** @psalm-var non-empty-string|null */
        return $this->search($value)['katakana_name'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return non-empty-string|null
     *
     * @param int|string|null $value
     * @return string|null
     */
    #[\Override]
    public function convertToStadiumEnglishName(int|string|null $value): ?string
    {
        /** @psalm-var non-empty-string|null */
        return $this->search($value)['english_name'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return non-empty-string|null
     *
     * @param int|string|null $value
     * @return string|null
     */
    #[\Override]
    public function convertToStadiumUrl(int|string|null $value): ?string
    {
        /** @psalm-var non-empty-string|null */
        return $this->search($value)['url'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return array{
     *     number: int<1, 24>,
     *     name: non-empty-string,
     *     short_name: non-empty-string,
     *     hiragana_name: non-empty-string,
     *     katakana_name: non-empty-string,
     *     english_name: non-empty-string,
     *     url: non-empty-string
     * }|null
     *
     * @param int|string|null $value
     * @return array|null
     */
    #[\Override]
    protected function search(int|string|null $value): ?array
    {
        if ($value === null) {
            return null;
        }

        if (is_string($value)) {
            $value = (string) Trimmer::trim($this->converter->convertToString($value));
        } else {
            $value = (int) Trimmer::trim($this->converter->convertToInt($value));
        }

        /**
         * @psalm-var array{
         *     number: int<1, 24>,
         *     name: non-empty-string,
         *     short_name: non-empty-string,
         *     hiragana_name: non-empty-string,
         *     katakana_name: non-empty-string,
         *     english_name: non-empty-string,
         *     url: non-empty-string
         * }
         */
        return Stadium::byNumber($value)
            ?? Stadium::byName($value)
            ?? Stadium::byShortName($value)
            ?? Stadium::byHiraganaName($value)
            ?? Stadium::byKatakanaName($value)
            ?? Stadium::byEnglishName($value)
            ?? Stadium::byUrl($value);
    }
}
