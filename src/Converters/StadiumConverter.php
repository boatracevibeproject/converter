<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Stadium\Stadium;
use BVP\Trimmer\Trimmer;

/**
 * @psalm-import-type Stadium from \BVP\Converter\StadiumType as StadiumType
 *
 * @author shimomo
 */
final class StadiumConverter extends BaseConverter implements StadiumConverterInterface
{
    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?int<1, 24>
     *
     * @param int|string|null $value
     * @return ?int
     */
    #[\Override]
    public function convertToStadiumNumber(int|string|null $value): ?int
    {
        /** @psalm-var ?int<1, 24> */
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
    public function convertToStadiumName(int|string|null $value): ?string
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
    public function convertToStadiumShortName(int|string|null $value): ?string
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
    public function convertToStadiumHiraganaName(int|string|null $value): ?string
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
    public function convertToStadiumKatakanaName(int|string|null $value): ?string
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
    public function convertToStadiumEnglishName(int|string|null $value): ?string
    {
        /** @psalm-var ?non-empty-string */
        return $this->search($value)['english_name'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    #[\Override]
    public function convertToStadiumUrl(int|string|null $value): ?string
    {
        /** @psalm-var ?non-empty-string */
        return $this->search($value)['url'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?StadiumType
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

        /** @psalm-var StadiumType */
        return Stadium::byNumber($value)
            ?? Stadium::byName($value)
            ?? Stadium::byShortName($value)
            ?? Stadium::byHiraganaName($value)
            ?? Stadium::byKatakanaName($value)
            ?? Stadium::byEnglishName($value)
            ?? Stadium::byUrl($value);
    }
}
