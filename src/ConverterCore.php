<?php

declare(strict_types=1);

namespace BVP\Converter;

use BVP\Converter\Converters\ClassConverter;
use BVP\Converter\Converters\ConverterInterface;
use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\CoreParser;
use BVP\Converter\Converters\PlaceConverter;
use BVP\Converter\Converters\PrefectureConverter;
use BVP\Converter\Converters\StadiumConverter;
use BVP\Converter\Converters\TechniqueConverter;
use BVP\Converter\Converters\WeatherConverter;
use BVP\Converter\Converters\WindDirectionConverter;

/**
 * @psalm-method ?int<1, 4> convertToClassNumber(int|string|null $value)
 * @psalm-method ?non-empty-string convertToClassName(int|string|null $value)
 * @psalm-method ?non-empty-string convertToClassShortName(int|string|null $value)
 * @psalm-method ?int convertToInt(int|float|string|null $value)
 * @psalm-method ?float convertToFloat(int|float|string|null $value)
 * @psalm-method ?string convertToString(int|float|string|null $value)
 * @psalm-method ?string convertToName(?string $value)
 * @psalm-method ?int<0, 4> parseFlyingCount(?string $value)
 * @psalm-method ?int<0, 4> parseLateCount(?string $value)
 * @psalm-method ?float parseStartTiming(?string $value)
 * @psalm-method ?int<0, max> parseWindSpeed(?string $value)
 * @psalm-method ?int<1, 17> parseWindDirectionNumber(?string $value)
 * @psalm-method ?int<0, max> parseWaveHeight(?string $value)
 * @psalm-method ?float parseTemperature(?string $value)
 * @psalm-method ?int<1, 16> convertToPlaceNumber(int|string|null $value)
 * @psalm-method ?non-empty-string convertToPlaceName(int|string|null $value)
 * @psalm-method ?non-empty-string convertToPlaceShortName(int|string|null $value)
 * @psalm-method ?int<1, 47> convertToPrefectureNumber(int|string|null $value)
 * @psalm-method ?non-empty-string convertToPrefectureName(int|string|null $value)
 * @psalm-method ?non-empty-string convertToPrefectureShortName(int|string|null $value)
 * @psalm-method ?non-empty-string convertToPrefectureHiraganaName(int|string|null $value)
 * @psalm-method ?non-empty-string convertToPrefectureKatakanaName(int|string|null $value)
 * @psalm-method ?non-empty-string convertToPrefectureEnglishName(int|string|null $value)
 * @psalm-method ?int<1, 24> convertToStadiumNumber(int|string|null $value)
 * @psalm-method ?non-empty-string convertToStadiumName(int|string|null $value)
 * @psalm-method ?non-empty-string convertToStadiumShortName(int|string|null $value)
 * @psalm-method ?non-empty-string convertToStadiumHiraganaName(int|string|null $value)
 * @psalm-method ?non-empty-string convertToStadiumKatakanaName(int|string|null $value)
 * @psalm-method ?non-empty-string convertToStadiumEnglishName(int|string|null $value)
 * @psalm-method ?non-empty-string convertToStadiumUrl(int|string|null $value)
 * @psalm-method ?int<1, 6> convertToTechniqueNumber(int|string|null $value)
 * @psalm-method ?non-empty-string convertToTechniqueName(int|string|null $value)
 * @psalm-method ?non-empty-string convertToTechniqueShortName(int|string|null $value)
 * @psalm-method ?int<1, 5> convertToWeatherNumber(int|string|null $value)
 * @psalm-method ?non-empty-string convertToWeatherName(int|string|null $value)
 * @psalm-method ?non-empty-string convertToWeatherShortName(int|string|null $value)
 * @psalm-method ?int<1, 17> convertToWindDirectionNumber(int|string|null $value)
 * @psalm-method ?non-empty-string convertToWindDirectionName(int|string|null $value)
 * @psalm-method ?non-empty-string convertToWindDirectionShortName(int|string|null $value)
 *
 * @method ?int<1, 4> convertToClassNumber(int|string|null $value)
 * @method ?non-empty-string convertToClassName(int|string|null $value)
 * @method ?non-empty-string convertToClassShortName(int|string|null $value)
 * @method ?int convertToInt(int|float|string|null $value)
 * @method ?float convertToFloat(int|float|string|null $value)
 * @method ?string convertToString(int|float|string|null $value)
 * @method ?string convertToName(?string $value)
 * @method ?int<0, 4> parseFlyingCount(?string $value)
 * @method ?int<0, 4> parseLateCount(?string $value)
 * @method ?float parseStartTiming(?string $value)
 * @method ?int<0, max> parseWindSpeed(?string $value)
 * @method ?int<1, 17> parseWindDirectionNumber(?string $value)
 * @method ?int<0, max> parseWaveHeight(?string $value)
 * @method ?float parseTemperature(?string $value)
 * @method ?int<1, 16> convertToPlaceNumber(int|string|null $value)
 * @method ?non-empty-string convertToPlaceName(int|string|null $value)
 * @method ?non-empty-string convertToPlaceShortName(int|string|null $value)
 * @method ?int<1, 47> convertToPrefectureNumber(int|string|null $value)
 * @method ?non-empty-string convertToPrefectureName(int|string|null $value)
 * @method ?non-empty-string convertToPrefectureShortName(int|string|null $value)
 * @method ?non-empty-string convertToPrefectureHiraganaName(int|string|null $value)
 * @method ?non-empty-string convertToPrefectureKatakanaName(int|string|null $value)
 * @method ?non-empty-string convertToPrefectureEnglishName(int|string|null $value)
 * @method ?int<1, 24> convertToStadiumNumber(int|string|null $value)
 * @method ?non-empty-string convertToStadiumName(int|string|null $value)
 * @method ?non-empty-string convertToStadiumShortName(int|string|null $value)
 * @method ?non-empty-string convertToStadiumHiraganaName(int|string|null $value)
 * @method ?non-empty-string convertToStadiumKatakanaName(int|string|null $value)
 * @method ?non-empty-string convertToStadiumEnglishName(int|string|null $value)
 * @method ?non-empty-string convertToStadiumUrl(int|string|null $value)
 * @method ?int<1, 6> convertToTechniqueNumber(int|string|null $value)
 * @method ?non-empty-string convertToTechniqueName(int|string|null $value)
 * @method ?non-empty-string convertToTechniqueShortName(int|string|null $value)
 * @method ?int<1, 5> convertToWeatherNumber(int|string|null $value)
 * @method ?non-empty-string convertToWeatherName(int|string|null $value)
 * @method ?non-empty-string convertToWeatherShortName(int|string|null $value)
 * @method ?int<1, 17> convertToWindDirectionNumber(int|string|null $value)
 * @method ?non-empty-string convertToWindDirectionName(int|string|null $value)
 * @method ?non-empty-string convertToWindDirectionShortName(int|string|null $value)
 *
 * @author shimomo
 */
final class ConverterCore implements ConverterCoreInterface
{
    /**
     * @psalm-var array<
     *     class-string<\BVP\Converter\Converters\ConverterInterface>,
     *     \BVP\Converter\Converters\ConverterInterface
     * >
     *
     * @var array
     */
    private array $instances = [];

    /**
     * @psalm-var array<
     *     non-empty-string,
     *     class-string<\BVP\Converter\Converters\ConverterInterface>
     * >
     *
     * @var array
     */
    private array $converterClasses = [
        'convertToClass' => ClassConverter::class,
        'convertToPlace' => PlaceConverter::class,
        'convertToPrefecture' => PrefectureConverter::class,
        'convertToStadium' => StadiumConverter::class,
        'convertToTechnique' => TechniqueConverter::class,
        'convertToWeather' => WeatherConverter::class,
        'convertToWindDirection' => WindDirectionConverter::class,
        'convert' => CoreConverter::class,
        'parse' => CoreParser::class,
    ];

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param list<mixed> $arguments
     * @psalm-return int|float|string|null
     *
     * @param string $name
     * @param array $arguments
     * @return int|float|string|null
     * @throws \InvalidArgumentException
     */
    public function __call(string $name, array $arguments): int|float|string|null
    {
        $countArguments = count($arguments);
        if ($countArguments === 1) {
            return $this->convert($name, ...$arguments);
        }

        $messageType = $countArguments === 0 ? 'few' : 'many';
        throw new \InvalidArgumentException(
            __METHOD__ . "() - Too {$messageType} arguments to function " . self::class . "::{$name}(), " .
            "{$countArguments} passed and exactly 1 expected."
        );
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param mixed $value
     * @psalm-return int|float|string|null
     *
     * @param  string $name
     * @param  mixed $value
     * @return int|float|string|null
     * @throws \BadMethodCallException
     */
    private function convert(string $name, mixed $value): int|float|string|null
    {
        $specificConverterClass = $this->resolveConverterClass($name);
        $coreConverterClass = $this->resolveConverterClass('convert');

        $converterInstance = $this->getConverterInstance($specificConverterClass, $coreConverterClass);
        if (!method_exists($converterInstance, $name)) {
            throw new \BadMethodCallException(
                __METHOD__ . "() - Call to undefined method " . $converterInstance::class . "::{$name}()."
            );
        }

        /** @psalm-var int|float|string|null */
        return $converterInstance->$name($value);
    }

    /**
     * @psalm-param class-string<\BVP\Converter\Converters\ConverterInterface> $specificConverterClass
     * @psalm-param class-string<\BVP\Converter\Converters\ConverterInterface> $coreConverterClass
     * @psalm-return \BVP\Converter\Converters\ConverterInterface
     *
     * @param string $specificConverterClass
     * @param string $coreConverterClass
     * @return \BVP\Converter\Converters\ConverterInterface
     */
    // phpcs:ignore Generic.Files.LineLength
    private function getConverterInstance(string $specificConverterClass, string $coreConverterClass): ConverterInterface
    {
        /** @psalm-suppress UnsafeInstantiation */
        $response =  $this->instances[$specificConverterClass] ??= $specificConverterClass === $coreConverterClass
            ? new $specificConverterClass()
            : new $specificConverterClass(new $coreConverterClass());

        if (!$response instanceof ConverterInterface) {
            throw new \LogicException('Invalid instance type.');
        }

        return $response;
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-return class-string<\BVP\Converter\Converters\ConverterInterface>
     *
     * @param string $name
     * @return string
     */
    private function resolveConverterClass(string $name): string
    {
        $filtered = array_filter($this->converterClasses, function ($key) use ($name) {
            return str_starts_with($name, $key) && $name !== $key;
        }, ARRAY_FILTER_USE_KEY);

        return array_shift($filtered) ?? $this->converterClasses['convert'];
    }
}
