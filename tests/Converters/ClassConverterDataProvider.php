<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

/**
 * @author shimomo
 */
final class ClassConverterDataProvider
{
    /**
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<int<1, 4>|non-empty-string|null>,
     *     expected: int<1, 4>|null
     * }>
     *
     * @return array
     */
    public static function convertToClassNumberProvider(): array
    {
        return [
            ['arguments' => [4], 'expected' => 4],
            ['arguments' => ['B2級'], 'expected' => 4],
            ['arguments' => ['B2'], 'expected' => 4],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<int<1, 4>|non-empty-string|null>,
     *     expected: non-empty-string|null
     * }>
     *
     * @return array
     */
    public static function convertToClassNameProvider(): array
    {
        return [
            ['arguments' => [4], 'expected' => 'B2級'],
            ['arguments' => ['B2級'], 'expected' => 'B2級'],
            ['arguments' => ['B2'], 'expected' => 'B2級'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<int<1, 4>|non-empty-string|null>,
     *     expected: non-empty-string|null
     * }>
     *
     * @return array
     */
    public static function convertToClassShortNameProvider(): array
    {
        return [
            ['arguments' => [4], 'expected' => 'B2'],
            ['arguments' => ['B2級'], 'expected' => 'B2'],
            ['arguments' => ['B2'], 'expected' => 'B2'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }
}
