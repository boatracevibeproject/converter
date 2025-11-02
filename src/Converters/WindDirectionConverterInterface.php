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
     * @psalm-return int<1, 17>|null
     *
     * @param int|string|null $value
     * @return int|null
     */
    public function convertToWindDirectionNumber(int|string|null $value): ?int;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return non-empty-string|null
     *
     * @param int|string|null $value
     * @return string|null
     */
    public function convertToWindDirectionName(int|string|null $value): ?string;
}
