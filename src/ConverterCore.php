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
 * @author shimomo
 */
class ConverterCore implements ConverterCoreInterface
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
