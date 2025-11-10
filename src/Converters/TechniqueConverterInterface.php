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
     * @psalm-return ?int<1, 6>
     *
     * @param int|string|null $value
     * @return ?int
     */
    public function convertToTechniqueNumber(int|string|null $value): ?int;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    public function convertToTechniqueName(int|string|null $value): ?string;

    /**
     * @psalm-param int|string|null $value
     * @psalm-return ?non-empty-string
     *
     * @param int|string|null $value
     * @return ?string
     */
    public function convertToTechniqueShortName(int|string|null $value): ?string;
}
