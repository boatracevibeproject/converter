<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Prefecture\Prefecture;
use BVP\Trimmer\Trimmer;

/**
 * @psalm-import-type Prefecture from \BVP\Converter\PrefectureType as PrefectureType
 *
 * @author shimomo
 */
final class PrefectureConverter extends BaseConverter implements PrefectureConverterInterface
{
    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?int<1, 47>
     *
     * @param int|string|null $value
     * @return ?int
     */
    #[\Override]
    public function convertToPrefectureNumber(int|string|null $value): ?int
    {
        /** @psalm-var ?int<1, 47> */
        return $this->search($value)['number'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    #[\Override]
    public function convertToPrefectureName(int|string|null $value): ?string
    {
        /** @psalm-var ?non-empty-string */
        return $this->search($value)['name'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    #[\Override]
    public function convertToPrefectureShortName(int|string|null $value): ?string
    {
        /** @psalm-var ?non-empty-string */
        return $this->search($value)['short_name'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    #[\Override]
    public function convertToPrefectureHiraganaName(int|string|null $value): ?string
    {
        /** @psalm-var ?non-empty-string */
        return $this->search($value)['hiragana_name'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    #[\Override]
    public function convertToPrefectureKatakanaName(int|string|null $value): ?string
    {
        /** @psalm-var ?non-empty-string */
        return $this->search($value)['katakana_name'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    #[\Override]
    public function convertToPrefectureEnglishName(int|string|null $value): ?string
    {
        /** @psalm-var ?non-empty-string */
        return $this->search($value)['english_name'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?PrefectureType
     *
     * @param int|string|null $value
     * @return ?array
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

        /** @psalm-var PrefectureType */
        return Prefecture::byNumber($value)
            ?? Prefecture::byName($value)
            ?? Prefecture::byShortName($value)
            ?? Prefecture::byHiraganaName($value)
            ?? Prefecture::byKatakanaName($value)
            ?? Prefecture::byEnglishName($value);
    }
}
