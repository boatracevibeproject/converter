<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
final class ClassConverter extends BaseConverter implements ClassConverterInterface
{
    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?int<1, 4>
     *
     * @param int|string|null $value
     * @return ?int
     */
    #[\Override]
    public function convertToClassNumber(int|string|null $value): ?int
    {
        /** @psalm-var ?int<1, 4> */
        return $this->search($value)['number'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    #[\Override]
    public function convertToClassName(int|string|null $value): ?string
    {
        /** @psalm-var ?non-empty-string */
        return $this->search($value)['name'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    #[\Override]
    public function convertToClassShortName(int|string|null $value): ?string
    {
        /** @psalm-var ?non-empty-string */
        return $this->search($value)['short_name'] ?? null;
    }
}
