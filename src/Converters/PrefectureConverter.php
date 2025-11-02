<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Prefecture\Prefecture;
use BVP\Trimmer\Trimmer;

/**
 * @author shimomo
 */
class PrefectureConverter extends BaseConverter implements PrefectureConverterInterface
{
    /**
     * @psalm-param int|string|null $value
     * @psalm-return int<1, 47>|null
     *
     * @param int|string|null $value
     * @return int|null
     */
    #[\Override]
    public function convertToPrefectureNumber(int|string|null $value): ?int
    {
        /** @psalm-var int<1, 47>|null */
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
    public function convertToPrefectureName(int|string|null $value): ?string
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
    public function convertToPrefectureShortName(int|string|null $value): ?string
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
    public function convertToPrefectureHiraganaName(int|string|null $value): ?string
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
    public function convertToPrefectureKatakanaName(int|string|null $value): ?string
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
    public function convertToPrefectureEnglishName(int|string|null $value): ?string
    {
        /** @psalm-var non-empty-string|null */
        return $this->search($value)['english_name'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return array{
     *     number: int<1, 47>,
     *     name: non-empty-string,
     *     short_name: non-empty-string,
     *     hiragana_name: non-empty-string,
     *     katakana_name: non-empty-string,
     *     english_name: non-empty-string,
     *     region_number: int<1, 8>,
     *     region_name: non-empty-string,
     *     region_short_name: non-empty-string,
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
         *     number: int<1, 47>,
         *     name: non-empty-string,
         *     short_name: non-empty-string,
         *     hiragana_name: non-empty-string,
         *     katakana_name: non-empty-string,
         *     english_name: non-empty-string,
         *     region_number: int<1, 8>,
         *     region_name: non-empty-string,
         *     region_short_name: non-empty-string,
         * }
         */
        return Prefecture::byNumber($value)
            ?? Prefecture::byName($value)
            ?? Prefecture::byShortName($value)
            ?? Prefecture::byHiraganaName($value)
            ?? Prefecture::byKatakanaName($value)
            ?? Prefecture::byEnglishName($value);
    }
}
