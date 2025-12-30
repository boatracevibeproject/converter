<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Trimmer\Trimmer;

/**
 * @author shimomo
 */
final class CoreConverter implements CoreConverterInterface
{
    /**
     * @psalm-var array<non-empty-string, non-empty-string>
     *
     * @var array
     */
    private array $names = [
        '小神野紀代子' => '小神野 紀代子',
        '堀之内紀代子' => '堀之内 紀代子',
        '大久保信一郎' => '大久保 信一郎',
        'マイケル田代' => 'マイケル 田代',
        '安河内鈴之介' => '安河内 鈴之介',
    ];

    /**
     * @psalm-param int|float|string|null $value
     * @psalm-return ?int
     *
     * @param int|float|string|null $value
     * @return ?int
     */
    #[\Override]
    public function convertToInt(int|float|string|null $value): ?int
    {
        return is_null($value) ? null : (int) $value;
    }

    /**
     * @psalm-param int|float|string|null $value
     * @psalm-return ?float
     *
     * @param int|float|string|null $value
     * @return ?float
     */
    #[\Override]
    public function convertToFloat(int|float|string|null $value): ?float
    {
        return is_null($value) ? null : (float) $value;
    }

    /**
     * @psalm-param int|float|string|null $value
     * @psalm-return ?string
     *
     * @param int|float|string|null $value
     * @return ?string
     */
    #[\Override]
    public function convertToString(int|float|string|null $value): ?string
    {
        return is_null($value) ? null : mb_convert_kana((string) $value, 'KVas', 'UTF-8');
    }

    /**
     * @psalm-param string|null $value
     * @psalm-return ?string
     *
     * @param string|null $value
     * @return ?string
     */
    public function convertToName(?string $value): ?string
    {
        if (is_null($value)) {
            return null;
        }

        $value = $this->convertToString($value);
        /** @psalm-var string $value */
        $value = Trimmer::trim($value);
        $pattern = '/([\p{L}\p{M}\p{N}]+)\s+([\p{L}\p{M}\p{N}]+)/u';
        if (preg_match($pattern, $value, $matches)) {
            /** @psalm-var string */
            return Trimmer::trim($matches[1] . ' ' . $matches[2]);
        }

        if (array_key_exists($value, $this->names)) {
            return $this->names[$value];
        }

        return null;
    }
}
