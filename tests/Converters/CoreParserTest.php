<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\CoreParser;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class CoreParserTest extends TestCase
{
    /**
     * @psalm-suppress PropertyNotSetInConstructor
     * @psalm-var \BVP\Converter\Converters\CoreParser
     *
     * @var \BVP\Converter\Converters\CoreParser
     */
    protected CoreParser $parser;

    /**
     * @psalm-return void
     *
     * @return void
     */
    #[\Override]
    protected function setUp(): void
    {
        $this->parser = new CoreParser(
            new CoreConverter()
        );
    }

    /**
     * @psalm-param non-empty-list<non-empty-string|null> $arguments
     * @psalm-param int<0, 4>|null $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param int|null $expected
     * @return void
     */
    #[DataProviderExternal(CoreParserDataProvider::class, 'parseFlyingCountProvider')]
    public function testParseFlyingCount(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->parser->parseFlyingCount(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<non-empty-string|null> $arguments
     * @psalm-param int<0, 4>|null $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param int|null $expected
     * @return void
     */
    #[DataProviderExternal(CoreParserDataProvider::class, 'parseLateCountProvider')]
    public function testParseLateCount(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->parser->parseLateCount(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<non-empty-string|null> $arguments
     * @psalm-param float|null $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param float|null $expected
     * @return void
     */
    #[DataProviderExternal(CoreParserDataProvider::class, 'parseStartTimingProvider')]
    public function testParseStartTiming(array $arguments, ?float $expected): void
    {
        $this->assertSame($expected, $this->parser->parseStartTiming(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<non-empty-string|null> $arguments
     * @psalm-param int<0, max>|null $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param int|null $expected
     * @return void
     */
    #[DataProviderExternal(CoreParserDataProvider::class, 'parseWindSpeedProvider')]
    public function testParseWindSpeed(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->parser->parseWindSpeed(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<non-empty-string|null> $arguments
     * @psalm-param int<1, 17>|null $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param int|null $expected
     * @return void
     */
    #[DataProviderExternal(CoreParserDataProvider::class, 'parseWindDirectionNumberProvider')]
    public function testParseWindDirectionNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->parser->parseWindDirectionNumber(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<non-empty-string|null> $arguments
     * @psalm-param int<0, max>|null $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param int|null $expected
     * @return void
     */
    #[DataProviderExternal(CoreParserDataProvider::class, 'parseWaveHeightProvider')]
    public function testParseWaveHeight(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->parser->parseWaveHeight(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<non-empty-string|null> $arguments
     * @psalm-param float|null $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param float|null $expected
     * @return void
     */
    #[DataProviderExternal(CoreParserDataProvider::class, 'parseTemperatureProvider')]
    public function testParseTemperature(array $arguments, ?float $expected): void
    {
        $this->assertSame($expected, $this->parser->parseTemperature(...$arguments));
    }
}
