<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

/**
 * @author shimomo
 */
final class WeatherConverterDataProvider
{
    /**
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<int<1, 5>|non-empty-string|null>,
     *     expected: int<1, 5>|null
     * }>
     *
     * @return array
     */
    public static function convertToWeatherNumberProvider(): array
    {
        return [
            ['arguments' => [2], 'expected' => 2],
            ['arguments' => ['曇り'], 'expected' => 2],
            ['arguments' => ['曇'], 'expected' => 2],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<int<1, 5>|non-empty-string|null>,
     *     expected: non-empty-string|null
     * }>
     *
     * @return array
     */
    public static function convertToWeatherNameProvider(): array
    {
        return [
            ['arguments' => [2], 'expected' => '曇り'],
            ['arguments' => ['曇り'], 'expected' => '曇り'],
            ['arguments' => ['曇'], 'expected' => '曇り'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<int<1, 5>|non-empty-string|null>,
     *     expected: non-empty-string|null
     * }>
     *
     * @return array
     */
    public static function convertToWeatherShortNameProvider(): array
    {
        return [
            ['arguments' => [2], 'expected' => '曇'],
            ['arguments' => ['曇り'], 'expected' => '曇'],
            ['arguments' => ['曇'], 'expected' => '曇'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }
}
