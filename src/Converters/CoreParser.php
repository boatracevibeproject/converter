<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Trimmer\Trimmer;

/**
 * @author shimomo
 */
final class CoreParser implements CoreParserInterface
{
    /**
     * @psalm-param \BVP\Converter\Converters\CoreConverterInterface $converter
     *
     * @param \BVP\Converter\Converters\CoreConverterInterface $converter
     */
    public function __construct(private readonly CoreConverterInterface $converter)
    {
        //
    }

    /**
     * @psalm-param ?string $value
     * @psalm-return ?int<0, max>
     *
     * @param ?string $value
     * @return ?int
     */
    #[\Override]
    public function parseFlyingCount(?string $value): ?int
    {
        if ($value === null) {
            return null;
        }

        /** @psalm-var string */
        $value = Trimmer::ltrim($this->converter->convertToString($value), 'F');

        /** @psalm-var int<0, max> */
        return $this->converter->convertToInt($value);
    }

    /**
     * @psalm-param ?string $value
     * @psalm-return ?int<0, max>
     *
     * @param ?string $value
     * @return ?int
     */
    #[\Override]
    public function parseLateCount(?string $value): ?int
    {
        if ($value === null) {
            return null;
        }

        /** @psalm-var string */
        $value = Trimmer::ltrim($this->converter->convertToString($value), 'L');

        /** @psalm-var int<0, max> */
        return $this->converter->convertToInt($value);
    }

    /**
     * @psalm-param ?string $value
     * @psalm-return ?float
     *
     * @param ?string $value
     * @return ?float
     */
    #[\Override]
    public function parseStartTiming(?string $value): ?float
    {
        if ($value === null) {
            return null;
        }

        /** @psalm-var string */
        $value = Trimmer::trim($this->converter->convertToString($value));
        if (!preg_match('/(L|F\.\d{2}|0?\.\d{2})/u', $value)) {
            return null;
        }

        return match (substr($value, 0, 1)) {
            'L' => null,
            'F' => $this->converter->convertToFloat('-0' . (string) Trimmer::ltrim($value, 'F')),
            default => $this->converter->convertToFloat('0' . $value),
        };
    }

    /**
     * @psalm-param ?string $value
     * @psalm-return ?int<0, max>
     *
     * @param ?string $value
     * @return ?int
     */
    #[\Override]
    public function parseWindSpeed(?string $value): ?int
    {
        if ($value === null) {
            return null;
        }

        /** @psalm-var string */
        $value = Trimmer::rtrim($this->converter->convertToString($value), 'm');

        /** @psalm-var int<0, max> */
        return $this->converter->convertToInt($value);
    }

    /**
     * @psalm-param ?string $value
     * @psalm-return ?int<1, 17>
     *
     * @param ?string $value
     * @return ?int
     */
    #[\Override]
    public function parseWindDirectionNumber(?string $value): ?int
    {
        if ($value === null) {
            return null;
        }

        /** @psalm-var string */
        $value = Trimmer::trim($this->converter->convertToString($value));
        if (preg_match('/is-wind(\d+)/u', $value, $matches)) {
            /** @psalm-var int<1, 17> */
            return $this->converter->convertToInt($matches[1]);
        }

        return null;
    }

    /**
     * @psalm-param ?string $value
     * @psalm-return ?int<0, max>
     *
     * @param ?string $value
     * @return ?int
     */
    #[\Override]
    public function parseWaveHeight(?string $value): ?int
    {
        if ($value === null) {
            return null;
        }

        /** @psalm-var string */
        $value = Trimmer::rtrim($this->converter->convertToString($value), 'cm');

        /** @psalm-var int<0, max> */
        return $this->converter->convertToInt($value);
    }

    /**
     * @psalm-param ?string $value
     * @psalm-return ?float
     *
     * @param ?string $value
     * @return ?float
     */
    #[\Override]
    public function parseTemperature(?string $value): ?float
    {
        if ($value === null) {
            return null;
        }

        /** @psalm-var string */
        $value = Trimmer::rtrim($this->converter->convertToString($value), '℃');

        return $this->converter->convertToFloat($value);
    }
}
