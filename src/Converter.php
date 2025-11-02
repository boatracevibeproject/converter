<?php

declare(strict_types=1);

namespace BVP\Converter;

/**
 * @author shimomo
 */
class Converter implements ConverterInterface
{
    /**
     * @psalm-var \BVP\Converter\ConverterInterface|null
     *
     * @var \BVP\Converter\ConverterInterface|null
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
        /** @var int|float|string|null */
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
        /** @var int|float|string|null */
        return self::getInstance()->$name(...$arguments);
    }

    /**
     * @psalm-param \BVP\Converter\ConverterCoreInterface|null $converterCore
     * @psalm-return \BVP\Converter\ConverterInterface
     *
     * @param \BVP\Converter\ConverterCoreInterface|null $converterCore
     * @return \BVP\Converter\ConverterInterface
     */
    #[\Override]
    public static function getInstance(?ConverterCoreInterface $converterCore = null): ConverterInterface
    {
        return self::$instance ??= new self($converterCore ?? new ConverterCore());
    }

    /**
     * @psalm-param \BVP\Converter\ConverterCoreInterface|null $converterCore
     * @psalm-return \BVP\Converter\ConverterInterface
     *
     * @param \BVP\Converter\ConverterCoreInterface|null $converterCore
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
