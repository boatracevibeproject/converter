<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\StadiumConverter;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class StadiumConverterTest extends TestCase
{
    /**
     * @psalm-suppress PropertyNotSetInConstructor
     * @psalm-var \BVP\Converter\Converters\StadiumConverter
     *
     * @var \BVP\Converter\Converters\StadiumConverter
     */
    protected StadiumConverter $converter;

    /**
     * @psalm-return void
     *
     * @return void
     */
    #[\Override]
    protected function setUp(): void
    {
        $this->converter = new StadiumConverter(
            new CoreConverter()
        );
    }

    /**
     * @psalm-param non-empty-list<int<1, 24>|non-empty-string|null> $arguments
     * @psalm-param ?int<1, 24> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?int $expected
     * @return void
     */
    #[DataProviderExternal(StadiumConverterDataProvider::class, 'convertToStadiumNumberProvider')]
    public function testConvertToStadiumNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumNumber(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int<1, 24>|non-empty-string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(StadiumConverterDataProvider::class, 'convertToStadiumNameProvider')]
    public function testConvertToStadiumName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int<1, 24>|non-empty-string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(StadiumConverterDataProvider::class, 'convertToStadiumShortNameProvider')]
    public function testConvertToStadiumShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumShortName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int<1, 24>|non-empty-string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(StadiumConverterDataProvider::class, 'convertToStadiumHiraganaNameProvider')]
    public function testConvertToStadiumHiraganaName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumHiraganaName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int<1, 24>|non-empty-string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(StadiumConverterDataProvider::class, 'convertToStadiumKatakanaNameProvider')]
    public function testConvertToStadiumKatakanaName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumKatakanaName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int<1, 24>|non-empty-string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(StadiumConverterDataProvider::class, 'convertToStadiumEnglishNameProvider')]
    public function testConvertToStadiumEnglishName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumEnglishName(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<int<1, 24>|non-empty-string|null> $arguments
     * @psalm-param ?non-empty-string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?string $expected
     * @return void
     */
    #[DataProviderExternal(StadiumConverterDataProvider::class, 'convertToStadiumUrlProvider')]
    public function testConvertToStadiumUrl(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumUrl(...$arguments));
    }
}
