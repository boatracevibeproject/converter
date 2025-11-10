<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\PlaceConverter;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class PlaceConverterTest extends TestCase
{
    /**
     * @psalm-suppress PropertyNotSetInConstructor
     * @psalm-var \BVP\Converter\Converters\PlaceConverter
     *
     * @var \BVP\Converter\Converters\PlaceConverter
     */
    protected PlaceConverter $converter;

    /**
     * @psalm-return void
     *
     * @return void
     */
    #[\Override]
    protected function setUp(): void
    {
        $this->converter = new PlaceConverter(
            new CoreConverter()
        );
    }

    /**
     * @psalm-param non-empty-list<int<1, 16>|non-empty-string|null> $arguments
     * @psalm-param int<1, 16>|null $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param int|null $expected
     * @return void
     */
    #[DataProviderExternal(PlaceConverterDataProvider::class, 'convertToPlaceNumberProvider')]
    public function testConvertToPlaceNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPlaceNumber(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int<1, 16>|non-empty-string|null> $arguments
     * @psalm-param non-empty-string|null $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param string|null $expected
     * @return void
     */
    #[DataProviderExternal(PlaceConverterDataProvider::class, 'convertToPlaceNameProvider')]
    public function testConvertToPlaceName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPlaceName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int<1, 16>|non-empty-string|null> $arguments
     * @psalm-param non-empty-string|null $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param string|null $expected
     * @return void
     */
    #[DataProviderExternal(PlaceConverterDataProvider::class, 'convertToPlaceShortNameProvider')]
    public function testConvertToPlaceShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPlaceShortName(...$arguments));
    }
}
