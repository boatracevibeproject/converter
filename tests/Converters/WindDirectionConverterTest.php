<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\WindDirectionConverter;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class WindDirectionConverterTest extends TestCase
{
    /**
     * @psalm-suppress PropertyNotSetInConstructor
     * @psalm-var \BVP\Converter\Converters\WindDirectionConverter
     *
     * @var \BVP\Converter\Converters\WindDirectionConverter
     */
    protected WindDirectionConverter $converter;

    /**
     * @psalm-return void
     *
     * @return void
     */
    #[\Override]
    protected function setUp(): void
    {
        $this->converter = new WindDirectionConverter(
            new CoreConverter()
        );
    }

    /**
     * @psalm-param non-empty-list<int<1, 17>|non-empty-string|null> $arguments
     * @psalm-param ?int<1, 17> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?int $expected
     * @return void
     */
    #[DataProviderExternal(WindDirectionConverterDataProvider::class, 'convertToWindDirectionNumberProvider')]
    public function testConvertToWindDirectionNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWindDirectionNumber(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int<1, 17>|non-empty-string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(WindDirectionConverterDataProvider::class, 'convertToWindDirectionNameProvider')]
    public function testConvertToWindDirectionName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWindDirectionName(...$arguments));
    }
}
