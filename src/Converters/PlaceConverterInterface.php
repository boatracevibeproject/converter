<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
interface PlaceConverterInterface extends ConverterInterface
{
    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?int<1, 16>
     *
     * @param int|string|null $value
     * @return ?int
     */
    public function convertToPlaceNumber(int|string|null $value): ?int;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    public function convertToPlaceName(int|string|null $value): ?string;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    public function convertToPlaceShortName(int|string|null $value): ?string;
}
