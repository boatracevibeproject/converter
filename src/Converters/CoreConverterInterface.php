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
     * @psalm-return ?string
     *
     * @param int|float|string|null $value
     * @return ?string
     */
    public function convertToString(int|float|string|null $value): ?string;

    /**
     * @psalm-param int|float|string|null $value
     * @psalm-return ?float
     *
     * @param int|float|string|null $value
     * @return ?float
     */
    public function convertToFloat(int|float|string|null $value): ?float;

    /**
     * @psalm-param int|float|string|null $value
     * @psalm-return ?int
     *
     * @param int|float|string|null $value
     * @return ?int
     */
    public function convertToInt(int|float|string|null $value): ?int;
}
