<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
class ClassConverter extends BaseConverter implements ClassConverterInterface
{
    /**
     * @psalm-param int|string|null $value
     * @psalm-return int<1, 4>|null
     *
     * @param int|string|null $value
     * @return int|null
     */
    #[\Override]
    public function convertToClassNumber(int|string|null $value): ?int
    {
        /** @psalm-var int<1, 4>|null */
        return $this->search($value)['number'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return non-empty-string|null
     *
     * @param int|string|null $value
     * @return string|null
     */
    #[\Override]
    public function convertToClassName(int|string|null $value): ?string
    {
        /** @psalm-var non-empty-string|null */
        return $this->search($value)['name'] ?? null;
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return non-empty-string|null
     *
     * @param int|string|null $value
     * @return string|null
     */
    #[\Override]
    public function convertToClassShortName(int|string|null $value): ?string
    {
        /** @psalm-var non-empty-string|null */
        return $this->search($value)['short_name'] ?? null;
    }
}
