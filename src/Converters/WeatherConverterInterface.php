<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
interface WeatherConverterInterface extends ConverterInterface
{
    /**
     * @psalm-param int|string|null $value
     * @psalm-return int<1, 5>|null
     *
     * @param int|string|null $value
     * @return int|null
     */
    public function convertToWeatherNumber(int|string|null $value): ?int;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return non-empty-string|null
     *
     * @param int|string|null $value
     * @return string|null
     */
    public function convertToWeatherName(int|string|null $value): ?string;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return non-empty-string|null
     *
     * @param int|string|null $value
     * @return string|null
     */
    public function convertToWeatherShortName(int|string|null $value): ?string;
}
