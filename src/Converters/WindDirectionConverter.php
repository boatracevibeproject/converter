<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
final class WindDirectionConverter extends BaseConverter implements WindDirectionConverterInterface
{
    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?int<1, 17>
     *
     * @param int|string|null $value
     * @return ?int
     */
    #[\Override]
    public function convertToWindDirectionNumber(int|string|null $value): ?int
    {
        /** @psalm-var ?int<1, 17> */
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
    public function convertToWindDirectionName(int|string|null $value): ?string
    {
        /** @psalm-var ?non-empty-string */
        return $this->search($value)['name'] ?? null;
    }

    /**
     * @psalm-return non-empty-list<non-empty-string>
     *
     * @return array
     */
    #[\Override]
    protected function getAttributeKeys(): array
    {
        return ['number', 'name'];
    }
}
