<?php

declare(strict_types=1);

namespace BVP\Converter\Tests;

use BVP\Converter\ConverterCore;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class ConverterCoreTest extends TestCase
{
    /**
     * @psalm-suppress PropertyNotSetInConstructor
     * @psalm-var \BVP\Converter\ConverterCore
     *
     * @var \BVP\Converter\ConverterCore
     */
    protected ConverterCore $converter;

    /**
     * @psalm-return void
     *
     * @return void
     */
    #[\Override]
    protected function setUp(): void
    {
        $this->converter = new ConverterCore();
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?int<1, 4> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?int $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToClassNumberProvider')]
    public function testConvertToClassNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToClassNumber(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToClassNameProvider')]
    public function testConvertToClassName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToClassName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToClassShortNameProvider')]
    public function testConvertToClassShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToClassShortName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|float|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToStringProvider')]
    public function testConvertToString(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToString(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|float|string|null> $arguments
     * @psalm-param ?float $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?float $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToFloatProvider')]
    public function testConvertToFloat(array $arguments, ?float $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToFloat(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|float|string|null> $arguments
     * @psalm-param ?int $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?int $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToIntProvider')]
    public function testConvertToInt(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToInt(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<?string> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToNameProvider')]
    public function testConvertToName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<?string> $arguments
     * @psalm-param ?int<0, max> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'parseFlyingCountProvider')]
    public function testParseFlyingCount(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->parseFlyingCount(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<?string> $arguments
     * @psalm-param ?int<0, max> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'parseLateCountProvider')]
    public function testParseLateCount(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->parseLateCount(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<?string> $arguments
     * @psalm-param ?float $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?float $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'parseStartTimingProvider')]
    public function testParseStartTiming(array $arguments, ?float $expected): void
    {
        $this->assertSame($expected, $this->converter->parseStartTiming(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<?string> $arguments
     * @psalm-param ?int<0, max> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?int $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'parseWindSpeedProvider')]
    public function testParseWindSpeed(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->parseWindSpeed(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<?string> $arguments
     * @psalm-param ?int<1, 17> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?int $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'parseWindDirectionNumberProvider')]
    public function testParseWindDirectionNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->parseWindDirectionNumber(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<?string> $arguments
     * @psalm-param ?int<0, max> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?int $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'parseWaveHeightProvider')]
    public function testParseWaveHeight(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->parseWaveHeight(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<?string> $arguments
     * @psalm-param ?float $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?float $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'parseTemperatureProvider')]
    public function testParseTemperature(array $arguments, ?float $expected): void
    {
        $this->assertSame($expected, $this->converter->parseTemperature(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?int<1, 16> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?int $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToPlaceNumberProvider')]
    public function testConvertToPlaceNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPlaceNumber(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToPlaceNameProvider')]
    public function testConvertToPlaceName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPlaceName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<?string> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToPlaceShortNameProvider')]
    public function testConvertToPlaceShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPlaceShortName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?int<1, 47> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?int $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToPrefectureNumberProvider')]
    public function testConvertToPrefectureNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPrefectureNumber(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToPrefectureNameProvider')]
    public function testConvertToPrefectureName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPrefectureName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToPrefectureShortNameProvider')]
    public function testConvertToPrefectureShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPrefectureShortName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToPrefectureHiraganaNameProvider')]
    public function testConvertToPrefectureHiraganaName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPrefectureHiraganaName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToPrefectureKatakanaNameProvider')]
    public function testConvertToPrefectureKatakanaName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPrefectureKatakanaName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToPrefectureEnglishNameProvider')]
    public function testConvertToPrefectureEnglishName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPrefectureEnglishName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?int<1, 24> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?int $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToStadiumNumberProvider')]
    public function testConvertToStadiumNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumNumber(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToStadiumNameProvider')]
    public function testConvertToStadiumName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToStadiumShortNameProvider')]
    public function testConvertToStadiumShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumShortName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToStadiumHiraganaNameProvider')]
    public function testConvertToStadiumHiraganaName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumHiraganaName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToStadiumKatakanaNameProvider')]
    public function testConvertToStadiumKatakanaName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumKatakanaName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToStadiumEnglishNameProvider')]
    public function testConvertToStadiumEnglishName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumEnglishName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToStadiumUrlProvider')]
    public function testConvertToStadiumUrl(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumUrl(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?int<1, 6> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?int $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToTechniqueNumberProvider')]
    public function testConvertToTechniqueNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToTechniqueNumber(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToTechniqueNameProvider')]
    public function testConvertToTechniqueName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToTechniqueName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToTechniqueShortNameProvider')]
    public function testConvertToTechniqueShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToTechniqueShortName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?int<1, 5> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?int $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToWeatherNumberProvider')]
    public function testConvertToWeatherNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWeatherNumber(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToWeatherNameProvider')]
    public function testConvertToWeatherName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWeatherName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToWeatherShortNameProvider')]
    public function testConvertToWeatherShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWeatherShortName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?int<1, 17> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?int $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToWindDirectionNumberProvider')]
    public function testConvertToWindDirectionNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWindDirectionNumber(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(ConverterDataProvider::class, 'convertToWindDirectionNameProvider')]
    public function testConvertToWindDirectionName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWindDirectionName(...$arguments));
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testInvalidTooFewArguments(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "BVP\Converter\ConverterCore::__call() - " .
            "Too few arguments to function BVP\Converter\ConverterCore::invalid(), " .
            "0 passed and exactly 1 expected."
        );

        /** @psalm-suppress UndefinedMagicMethod */
        $this->converter->invalid();
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testInvalidTooManyArguments(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "BVP\Converter\ConverterCore::__call() - " .
            "Too many arguments to function BVP\Converter\ConverterCore::invalid(), " .
            "2 passed and exactly 1 expected."
        );

        /** @psalm-suppress UndefinedMagicMethod */
        $this->converter->invalid(1, 2);
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testInvalidUndefinedMethod(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage(
            "BVP\Converter\ConverterCore::convert() - " .
            "Call to undefined method BVP\Converter\Converters\CoreConverter::invalid()."
        );

        /** @psalm-suppress UndefinedMagicMethod */
        $this->converter->invalid(1);
    }
}
