<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
interface TechniqueConverterInterface extends ConverterInterface
{
    /**
     * @psalm-param int|string|null $value
     * @psalm-return int<1, 6>|null
     *
     * @param int|string|null $value
     * @return int|null
     */
    public function convertToTechniqueNumber(int|string|null $value): ?int;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return non-empty-string|null
     *
     * @param int|string|null $value
     * @return string|null
     */
    public function convertToTechniqueName(int|string|null $value): ?string;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return non-empty-string|null
     *
     * @param int|string|null $value
     * @return string|null
     */
    public function convertToTechniqueShortName(int|string|null $value): ?string;
}
