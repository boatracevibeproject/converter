<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

/**
 * @author shimomo
 */
final class WindDirectionConverterDataProvider
{
    /**
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<int<1, 17>|non-empty-string|null>,
     *     expected: int<1, 17>|null
     * }>
     *
     * @return array
     */
    public static function convertToWindDirectionNumberProvider(): array
    {
        return [
            ['arguments' => [4], 'expected' => 4],
            ['arguments' => ['東北東'], 'expected' => 4],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<int<1, 17>|non-empty-string|null>,
     *     expected: non-empty-string|null
     * }>
     *
     * @return array
     */
    public static function convertToWindDirectionNameProvider(): array
    {
        return [
            ['arguments' => [4], 'expected' => '東北東'],
            ['arguments' => ['東北東'], 'expected' => '東北東'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }
}
