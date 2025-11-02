<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
class WeatherConverter extends BaseConverter implements WeatherConverterInterface
{
    /**
     * @psalm-param int|string|null $value
     * @psalm-return int<1, 5>|null
     *
     * @param int|string|null $value
     * @return int|null
     */
    #[\Override]
    public function convertToWeatherNumber(int|string|null $value): ?int
    {
        /** @psalm-var int<1, 5>|null */
        return $this->search($value)['number'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return non-empty-string|null
     *
     * @param int|string|null $value
     * @return string|null
     */
    #[\Override]
    public function convertToWeatherName(int|string|null $value): ?string
    {
        /** @psalm-var non-empty-string|null */
        return $this->search($value)['name'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return non-empty-string|null
     *
     * @param int|string|null $value
     * @return string|null
     */
    #[\Override]
    public function convertToWeatherShortName(int|string|null $value): ?string
    {
        /** @psalm-var non-empty-string|null */
        return $this->search($value)['short_name'] ?? null;
    }
}
