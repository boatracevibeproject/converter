<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
interface PrefectureConverterInterface extends ConverterInterface
{
    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?int<1, 47>
     *
     * @param int|string|null $value
     * @return ?int
     */
    public function convertToPrefectureNumber(int|string|null $value): ?int;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    public function convertToPrefectureName(int|string|null $value): ?string;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    public function convertToPrefectureShortName(int|string|null $value): ?string;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    public function convertToPrefectureHiraganaName(int|string|null $value): ?string;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    public function convertToPrefectureKatakanaName(int|string|null $value): ?string;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    public function convertToPrefectureEnglishName(int|string|null $value): ?string;
}
