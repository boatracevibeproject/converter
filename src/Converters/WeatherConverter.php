<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
final class WeatherConverter extends BaseConverter implements WeatherConverterInterface
{
    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?int<1, 5>
     *
     * @param int|string|null $value
     * @return ?int
     */
    #[\Override]
    public function convertToWeatherNumber(int|string|null $value): ?int
    {
        /** @psalm-var ?int<1, 5> */
        return $this->search($value)['number'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    #[\Override]
    public function convertToWeatherName(int|string|null $value): ?string
    {
        /** @psalm-var ?non-empty-string */
        return $this->search($value)['name'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    #[\Override]
    public function convertToWeatherShortName(int|string|null $value): ?string
    {
        /** @psalm-var ?non-empty-string */
        return $this->search($value)['short_name'] ?? null;
    }
}
