<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class CoreConverterTest extends TestCase
{
    /**
     * @psalm-suppress PropertyNotSetInConstructor
     * @psalm-var \BVP\Converter\Converters\CoreConverter
     *
     * @var \BVP\Converter\Converters\CoreConverter
     */
    protected CoreConverter $converter;

    /**
     * @psalm-return void
     *
     * @return void
     */
    #[\Override]
    protected function setUp(): void
    {
        $this->converter = new CoreConverter();
    }

    /**
     * @psalm-param non-empty-list<int|float|non-empty-string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(CoreConverterDataProvider::class, 'convertToStringProvider')]
    public function testConvertToString(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToString(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|float|non-empty-string|null> $arguments
     * @psalm-param ?int $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?int $expected
     * @return void
     */
    #[DataProviderExternal(CoreConverterDataProvider::class, 'convertToIntProvider')]
    public function testConvertToInt(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToInt(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|float|non-empty-string|null> $arguments
     * @psalm-param ?float $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?float $expected
     * @return void
     */
    #[DataProviderExternal(CoreConverterDataProvider::class, 'convertToFloatProvider')]
    public function testConvertToFloat(array $arguments, ?float $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToFloat(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<?non-empty-string> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(CoreConverterDataProvider::class, 'convertToNameProvider')]
    public function testConvertToName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToName(...$arguments));
    }
}
