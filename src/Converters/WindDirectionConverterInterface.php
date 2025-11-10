<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
interface WindDirectionConverterInterface extends ConverterInterface
{
    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?int<1, 17>
     *
     * @param int|string|null $value
     * @return ?int
     */
    public function convertToWindDirectionNumber(int|string|null $value): ?int;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    public function convertToWindDirectionName(int|string|null $value): ?string;
}
