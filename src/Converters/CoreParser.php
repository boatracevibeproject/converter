<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Trimmer\Trimmer;

/**
 * @author shimomo
 */
class CoreParser implements CoreParserInterface
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
     * @psalm-param string|null $value
     * @psalm-return int<0, 4>|null
     *
     * @param string|null $value
     * @return int|null
     */
    #[\Override]
    public function parseFlyingCount(?string $value): ?int
    {
        if ($value === null) { return null; }
        $value = $this->converter->convertToString($value);
        /** @psalm-var string */
        $value = Trimmer::ltrim($value, 'F');
        /** @psalm-var int<0, 4> */
        return $this->converter->convertToInt($value);
    }

    /**
     * @psalm-param string|null $value
     * @psalm-return int<0, 4>|null
     *
     * @param string|null $value
     * @return int|null
     */
    #[\Override]
    public function parseLateCount(?string $value): ?int
    {
        if ($value === null) { return null; }
        $value = $this->converter->convertToString($value);
        /** @psalm-var string */
        $value = Trimmer::ltrim($value, 'L');
        /** @psalm-var int<0, 4> */
        return $this->converter->convertToInt($value);
    }

    /**
     * @psalm-param string|null $value
     * @psalm-return float|null
     *
     * @param string|null $value
     * @return float|null
     */
    #[\Override]
    public function parseStartTiming(?string $value): ?float
    {
        if ($value === null) { return null; }
        $value = $this->converter->convertToString($value);
        /** @psalm-var string */
        $value = Trimmer::trim($value);
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
     * @psalm-param string|null $value
     * @psalm-return int<0, max>|null
     *
     * @param string|null $value
     * @return int|null
     */
    #[\Override]
    public function parseWind(?string $value): ?int
    {
        if ($value === null) { return null; }
        $value = $this->converter->convertToString($value);
        /** @psalm-var string */
        $value = Trimmer::rtrim($value, 'm');
        /** @psalm-var int<0, max> */
        return $this->converter->convertToInt($value);
    }

    /**
     * @psalm-param string|null $value
     * @psalm-return int<1, 17>|null
     *
     * @param string|null $value
     * @return int|null
     */
    #[\Override]
    public function parseWindDirectionNumber(?string $value): ?int
    {
        if ($value === null) { return null; }
        $value = $this->converter->convertToString($value);
        /** @psalm-var string */
        $value = Trimmer::trim($value);
        if (preg_match('/is-wind(\d+)/u', $value, $matches)) {
            /** @psalm-var int<1, 17> */
            return $this->converter->convertToInt($matches[1]);
        }

        return null;
    }

    /**
     * @psalm-param string|null $value
     * @psalm-return int<0, max>|null
     *
     * @param string|null $value
     * @return int|null
     */
    #[\Override]
    public function parseWave(?string $value): ?int
    {
        if ($value === null) { return null; }
        $value = $this->converter->convertToString($value);
        /** @psalm-var string */
        $value = Trimmer::rtrim($value, 'cm');
        /** @psalm-var int<0, max> */
        return $this->converter->convertToInt($value);
    }

    /**
     * @psalm-param string|null $value
     * @psalm-return float|null
     *
     * @param string|null $value
     * @return float|null
     */
    #[\Override]
    public function parseTemperature(?string $value): ?float
    {
        if ($value === null) { return null; }
        $value = $this->converter->convertToString($value);
        /** @psalm-var string */
        $value = Trimmer::rtrim($value, '℃');
        return $this->converter->convertToFloat($value);
    }
}
