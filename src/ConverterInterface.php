<?php

declare(strict_types=1);

namespace BVP\Converter;

/**
 * @author shimomo
 */
interface ConverterInterface
{
    /**
     * @psalm-param \BVP\Converter\ConverterCoreInterface|null $converterCore
     * @psalm-return \BVP\Converter\ConverterInterface
     *
     * @param \BVP\Converter\ConverterCoreInterface|null $converterCore
     * @return \BVP\Converter\ConverterInterface
     */
    public static function getInstance(?ConverterCoreInterface $converterCore = null): ConverterInterface;

    /**
     * @psalm-param \BVP\Converter\ConverterCoreInterface|null $converterCore
     * @psalm-return \BVP\Converter\ConverterInterface
     *
     * @param \BVP\Converter\ConverterCoreInterface|null $converterCore
     * @return \BVP\Converter\ConverterInterface
     */
    public static function createInstance(?ConverterCoreInterface $converterCore = null): ConverterInterface;

    /**
     * @psalm-return void
     *
     * @return void
     */
    public static function resetInstance(): void;
}
