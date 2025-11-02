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
     * @psalm-return int<1, 16>|null
     *
     * @param int|string|null $value
     * @return int|null
     */
    public function convertToPlaceNumber(int|string|null $value): ?int;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return non-empty-string|null
     *
     * @param int|string|null $value
     * @return string|null
     */
    public function convertToPlaceName(int|string|null $value): ?string;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return non-empty-string|null
     *
     * @param int|string|null $value
     * @return string|null
     */
    public function convertToPlaceShortName(int|string|null $value): ?string;
}
