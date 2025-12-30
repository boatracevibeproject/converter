<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Converter\Traits\ConfigLoader;
use BVP\Trimmer\Trimmer;
use Shimomo\Helper\Arr;

/**
 * @author shimomo
 */
abstract class BaseConverter implements BaseConverterInterface
{
    use ConfigLoader;

    /**
     * @psalm-param \BVP\Converter\Converters\CoreConverterInterface $converter
     *
     * @param \BVP\Converter\Converters\CoreConverterInterface $converter
     */
    public function __construct(protected readonly CoreConverterInterface $converter)
    {
        //
    }

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?array<array-key, mixed>
     *
     * @param int|string|null $value
     * @return ?array
     */
    protected function search(int|string|null $value): ?array
    {
        if (is_null($value)) {
            return null;
        }

        if (is_string($value)) {
            $value = (string) Trimmer::trim($this->converter->convertToString($value));
        } else {
            $value = (int) Trimmer::trim($this->converter->convertToInt($value));
        }

        $items = $this->loadConfig($this->getConfigKey());
        $keys = $this->getAttributeKeys();
        return Arr::firstWhereKeys($items, $keys, $value);
    }

    /**
     * @psalm-return non-empty-string
     *
     * @return string
     * @throws \InvalidArgumentException
     */
    protected function getConfigKey(): string
    {
        $className = get_class($this);
        preg_match('/Converters\\\\(.+)Converter$/u', $className, $matches);
        $configKey = lcfirst($matches[1]);

        if (empty($configKey)) {
            throw new \InvalidArgumentException(
                __METHOD__ . "() - Config key '{$className}' does not exist."
            );
        }

        return $configKey;
    }

    /**
     * @psalm-return non-empty-list<non-empty-string>
     *
     * @return array
     */
    protected function getAttributeKeys(): array
    {
        return ['number', 'name', 'short_name'];
    }
}
