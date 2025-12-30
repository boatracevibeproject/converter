<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\WeatherConverter;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class WeatherConverterTest extends TestCase
{
    /**
     * @psalm-suppress PropertyNotSetInConstructor
     * @psalm-var \BVP\Converter\Converters\WeatherConverter
     *
     * @var \BVP\Converter\Converters\WeatherConverter
     */
    protected WeatherConverter $converter;

    /**
     * @psalm-return void
     *
     * @return void
     */
    #[\Override]
    protected function setUp(): void
    {
        $this->converter = new WeatherConverter(
            new CoreConverter()
        );
    }

    /**
     * @psalm-param non-empty-list<int<1, 5>|non-empty-string|null> $arguments
     * @psalm-param ?int<1, 5> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?int $expected
     * @return void
     */
    #[DataProviderExternal(WeatherConverterDataProvider::class, 'convertToWeatherNumberProvider')]
    public function testConvertToWeatherNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWeatherNumber(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int<1, 5>|non-empty-string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(WeatherConverterDataProvider::class, 'convertToWeatherNameProvider')]
    public function testConvertToWeatherName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWeatherName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int<1, 5>|non-empty-string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(WeatherConverterDataProvider::class, 'convertToWeatherShortNameProvider')]
    public function testConvertToWeatherShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWeatherShortName(...$arguments));
    }
}
