<?php

declare(strict_types=1);

namespace BVP\Converter\Traits;

/**
 * @author shimomo
 */
trait ConfigLoader
{
    /**
     * @psalm-var array<
     *     non-empty-string,
     *     non-empty-list<
     *         non-empty-array<
     *             non-empty-string,
     *             int|string
     *         >
     *     >
     * >
     *
     * @var array
     */
    private array $config = [];

    /**
     * @psalm-param non-empty-string $key
     * @psalm-return non-empty-list<
     *     non-empty-array<
     *         non-empty-string,
     *         int|string
     *     >
     * >
     *
     * @param string $key
     * @return array
     * @throws \InvalidArgumentException
     */
    private function loadConfig(string $key): array
    {
        if (isset($this->config[$key])) {
            return $this->config[$key];
        }

        $fileName = __DIR__ . '/../../config/' . $key . '.php';
        if (file_exists($fileName)) {
            /** @psalm-var non-empty-list<non-empty-array<non-empty-string, int|string>> */
            $config = require $fileName;

            return $this->config[$key] = $config;
        }

        throw new \InvalidArgumentException(
            __METHOD__ . "() - Config file '{$fileName}' does not exist."
        );
    }
}
