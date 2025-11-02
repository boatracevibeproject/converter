<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
interface CoreConverterInterface extends ConverterInterface
{
    /**
     * @psalm-param int|float|string|null $value
     * @psalm-return string|null
     *
     * @param int|float|string|null $value
     * @return string|null
     */
    public function convertToString(int|float|string|null $value): ?string;

    /**
     * @psalm-param int|float|string|null $value
     * @psalm-return float|null
     *
     * @param int|float|string|null $value
     * @return float|null
     */
    public function convertToFloat(int|float|string|null $value): ?float;

    /**
     * @psalm-param int|float|string|null $value
     * @psalm-return int|null
     *
     * @param int|float|string|null $value
     * @return int|null
     */
    public function convertToInt(int|float|string|null $value): ?int;
}
