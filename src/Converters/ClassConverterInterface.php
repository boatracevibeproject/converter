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
     * @psalm-return ?int<1, 4>
     *
     * @param int|string|null $value
     * @return ?int
     */
    public function convertToClassNumber(int|string|null $value): ?int;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    public function convertToClassName(int|string|null $value): ?string;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    public function convertToClassShortName(int|string|null $value): ?string;
}
