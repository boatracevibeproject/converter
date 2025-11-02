<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
interface CoreParserInterface extends ConverterInterface
{
    /**
     * @psalm-param string|null $value
     * @psalm-return int<0, 4>|null
     *
     * @param string|null $value
     * @return int|null
     */
    public function parseFlyingCount(?string $value): ?int;

    /**
     * @psalm-param string|null $value
     * @psalm-return int<0, 4>|null
     *
     * @param string|null $value
     * @return int|null
     */
    public function parseLateCount(?string $value): ?int;

    /**
     * @psalm-param string|null $value
     * @psalm-return float|null
     *
     * @param string|null $value
     * @return float|null
     */
    public function parseStartTiming(?string $value): ?float;

    /**
     * @psalm-param string|null $value
     * @psalm-return int<0, max>|null
     *
     * @param string|null $value
     * @return int|null
     */
    public function parseWind(?string $value): ?int;

    /**
     * @psalm-param string|null $value
     * @psalm-return int<1, 17>|null
     *
     * @param string|null $value
     * @return int|null
     */
    public function parseWindDirectionNumber(?string $value): ?int;

    /**
     * @psalm-param string|null $value
     * @psalm-return int<0, max>|null
     *
     * @param string|null $value
     * @return int|null
     */
    public function parseWave(?string $value): ?int;

    /**
     * @psalm-param string|null $value
     * @psalm-return float|null
     *
     * @param string|null $value
     * @return float|null
     */
    public function parseTemperature(?string $value): ?float;
}
