<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
interface ClassConverterInterface extends ConverterInterface
{
    /**
     * @psalm-param int|string|null $value
     * @psalm-return int<1, 4>|null
     *
     * @param int|string|null $value
     * @return int|null
     */
    public function convertToClassNumber(int|string|null $value): ?int;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return non-empty-string|null
     *
     * @param int|string|null $value
     * @return string|null
     */
    public function convertToClassName(int|string|null $value): ?string;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return non-empty-string|null
     *
     * @param int|string|null $value
     * @return string|null
     */
    public function convertToClassShortName(int|string|null $value): ?string;
}
