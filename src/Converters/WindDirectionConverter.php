<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
class WindDirectionConverter extends BaseConverter implements WindDirectionConverterInterface
{
    /**
     * @psalm-param int|string|null $value
     * @psalm-return int<1, 17>|null
     *
     * @param int|string|null $value
     * @return int|null
     */
    #[\Override]
    public function convertToWindDirectionNumber(int|string|null $value): ?int
    {
        /** @psalm-var int<1, 17>|null */
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
    public function convertToWindDirectionName(int|string|null $value): ?string
    {
        /** @var non-empty-string|null */
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
