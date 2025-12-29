<?php

declare(strict_types=1);

namespace BVP\Converter;

/**
 * @psalm-method static ?int<1, 4> convertToClassNumber(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToClassName(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToClassShortName(int|string|null $value)
 * @psalm-method static ?int convertToInt(int|float|string|null $value)
 * @psalm-method static ?float convertToFloat(int|float|string|null $value)
 * @psalm-method static ?string convertToString(int|float|string|null $value)
 * @psalm-method static ?string convertToName(?string $value)
 * @psalm-method static ?int<0, 4> parseFlyingCount(?string $value)
 * @psalm-method static ?int<0, 4> parseLateCount(?string $value)
 * @psalm-method static ?float parseStartTiming(?string $value)
 * @psalm-method static ?int<0, max> parseWindSpeed(?string $value)
 * @psalm-method static ?int<1, 17> parseWindDirectionNumber(?string $value)
 * @psalm-method static ?int<0, max> parseWave(?string $value)
 * @psalm-method static ?float parseTemperature(?string $value)
 * @psalm-method static ?int<1, 16> convertToPlaceNumber(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToPlaceName(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToPlaceShortName(int|string|null $value)
 * @psalm-method static ?int<1, 47> convertToPrefectureNumber(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToPrefectureName(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToPrefectureShortName(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToPrefectureHiraganaName(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToPrefectureKatakanaName(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToPrefectureEnglishName(int|string|null $value)
 * @psalm-method static ?int<1, 24> convertToStadiumNumber(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToStadiumName(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToStadiumShortName(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToStadiumHiraganaName(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToStadiumKatakanaName(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToStadiumEnglishName(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToStadiumUrl(int|string|null $value)
 * @psalm-method static ?int<1, 6> convertToTechniqueNumber(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToTechniqueName(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToTechniqueShortName(int|string|null $value)
 * @psalm-method static ?int<1, 5> convertToWeatherNumber(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToWeatherName(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToWeatherShortName(int|string|null $value)
 * @psalm-method static ?int<1, 17> convertToWindDirectionNumber(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToWindDirectionName(int|string|null $value)
 * @psalm-method static ?non-empty-string convertToWindDirectionShortName(int|string|null $value)
 *
 * @method static ?int<1, 4> convertToClassNumber(int|string|null $value)
 * @method static ?non-empty-string convertToClassName(int|string|null $value)
 * @method static ?non-empty-string convertToClassShortName(int|string|null $value)
 * @method static ?int convertToInt(int|float|string|null $value)
 * @method static ?float convertToFloat(int|float|string|null $value)
 * @method static ?string convertToString(int|float|string|null $value)
 * @method static ?string convertToName(?string $value)
 * @method static ?int<0, 4> parseFlyingCount(?string $value)
 * @method static ?int<0, 4> parseLateCount(?string $value)
 * @method static ?float parseStartTiming(?string $value)
 * @method static ?int<0, max> parseWind(?string $value)
 * @method static ?int<1, 17> parseWindDirectionNumber(?string $value)
 * @method static ?int<0, max> parseWave(?string $value)
 * @method static ?float parseTemperature(?string $value)
 * @method static ?int<1, 16> convertToPlaceNumber(int|string|null $value)
 * @method static ?non-empty-string convertToPlaceName(int|string|null $value)
 * @method static ?non-empty-string convertToPlaceShortName(int|string|null $value)
 * @method static ?int<1, 47> convertToPrefectureNumber(int|string|null $value)
 * @method static ?non-empty-string convertToPrefectureName(int|string|null $value)
 * @method static ?non-empty-string convertToPrefectureShortName(int|string|null $value)
 * @method static ?non-empty-string convertToPrefectureHiraganaName(int|string|null $value)
 * @method static ?non-empty-string convertToPrefectureKatakanaName(int|string|null $value)
 * @method static ?non-empty-string convertToPrefectureEnglishName(int|string|null $value)
 * @method static ?int<1, 24> convertToStadiumNumber(int|string|null $value)
 * @method static ?non-empty-string convertToStadiumName(int|string|null $value)
 * @method static ?non-empty-string convertToStadiumShortName(int|string|null $value)
 * @method static ?non-empty-string convertToStadiumHiraganaName(int|string|null $value)
 * @method static ?non-empty-string convertToStadiumKatakanaName(int|string|null $value)
 * @method static ?non-empty-string convertToStadiumEnglishName(int|string|null $value)
 * @method static ?non-empty-string convertToStadiumUrl(int|string|null $value)
 * @method static ?int<1, 6> convertToTechniqueNumber(int|string|null $value)
 * @method static ?non-empty-string convertToTechniqueName(int|string|null $value)
 * @method static ?non-empty-string convertToTechniqueShortName(int|string|null $value)
 * @method static ?int<1, 5> convertToWeatherNumber(int|string|null $value)
 * @method static ?non-empty-string convertToWeatherName(int|string|null $value)
 * @method static ?non-empty-string convertToWeatherShortName(int|string|null $value)
 * @method static ?int<1, 17> convertToWindDirectionNumber(int|string|null $value)
 * @method static ?non-empty-string convertToWindDirectionName(int|string|null $value)
 * @method static ?non-empty-string convertToWindDirectionShortName(int|string|null $value)
 *
 * @author shimomo
 */
final class Converter implements ConverterInterface
{
    /**
     * @psalm-var ?\BVP\Converter\ConverterInterface
     *
     * @var ?\BVP\Converter\ConverterInterface
     */
    private static ?ConverterInterface $instance;

    /**
     * @psalm-param \BVP\Converter\ConverterCoreInterface $converter
     *
     * @param \BVP\Converter\ConverterCoreInterface $converter
     */
    public function __construct(private readonly ConverterCoreInterface $converter)
    {
        //
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param list<mixed> $arguments
     * @psalm-return int|float|string|null
     *
     * @param string $name
     * @param array $arguments
     * @return int|float|string|null
     */
    public function __call(string $name, array $arguments): int|float|string|null
    {
        /** @psalm-var int|float|string|null */
        return $this->converter->$name(...$arguments);
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param list<mixed> $arguments
     * @psalm-return int|float|string|null
     *
     * @param string $name
     * @param array $arguments
     * @return int|float|string|null
     */
    public static function __callStatic(string $name, array $arguments): int|float|string|null
    {
        /** @psalm-var int|float|string|null */
        return self::getInstance()->$name(...$arguments);
    }

    /**
     * @psalm-param ?\BVP\Converter\ConverterCoreInterface $converterCore
     * @psalm-return \BVP\Converter\ConverterInterface
     *
     * @param ?\BVP\Converter\ConverterCoreInterface $converterCore
     * @return \BVP\Converter\ConverterInterface
     */
    #[\Override]
    public static function getInstance(?ConverterCoreInterface $converterCore = null): ConverterInterface
    {
        return self::$instance ??= new self($converterCore ?? new ConverterCore());
    }

    /**
     * @psalm-param ?\BVP\Converter\ConverterCoreInterface $converterCore
     * @psalm-return \BVP\Converter\ConverterInterface
     *
     * @param ?\BVP\Converter\ConverterCoreInterface $converterCore
     * @return \BVP\Converter\ConverterInterface
     */
    #[\Override]
    public static function createInstance(?ConverterCoreInterface $converterCore = null): ConverterInterface
    {
        return self::$instance = new self($converterCore ?? new ConverterCore());
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    #[\Override]
    public static function resetInstance(): void
    {
        self::$instance = null;
    }
}
