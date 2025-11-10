<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
interface CoreParserInterface extends ConverterInterface
{
    /**
     * @psalm-param ?string $value
     * @psalm-return ?int<0, max>
     *
     * @param ?string $value
     * @return ?int
     */
    public function parseFlyingCount(?string $value): ?int;

    /**
     * @psalm-param ?string $value
     * @psalm-return ?int<0, max>
     *
     * @param string|null $value
     * @return ?int
     */
    public function parseLateCount(?string $value): ?int;

    /**
     * @psalm-param ?string $value
     * @psalm-return ?float
     *
     * @param ?string $value
     * @return ?float
     */
    public function parseStartTiming(?string $value): ?float;

    /**
     * @psalm-param ?string $value
     * @psalm-return ?int<0, max>
     *
     * @param ?string $value
     * @return ?int
     */
    public function parseWind(?string $value): ?int;

    /**
     * @psalm-param ?string $value
     * @psalm-return ?int<1, 17>
     *
     * @param ?string $value
     * @return ?int
     */
    public function parseWindDirectionNumber(?string $value): ?int;

    /**
     * @psalm-param ?string $value
     * @psalm-return ?int<0, max>
     *
     * @param ?string $value
     * @return ?int
     */
    public function parseWave(?string $value): ?int;

    /**
     * @psalm-param ?string $value
     * @psalm-return ?float
     *
     * @param ?string $value
     * @return ?float
     */
    public function parseTemperature(?string $value): ?float;
}
