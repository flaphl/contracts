<?php

/**
 * This file is part of the Flaphl package.
 *
 * (c) Jade Phyressi <jade@flaphl.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flaphl\Contracts\Cache;

use Psr\Cache\CacheItemPoolInterface as PsrCacheItemPoolInterface;
use Psr\Cache\InvalidArgumentException;

/**
 * Interface for a cache item pool.
 */
interface CacheInterface extends PsrCacheItemPoolInterface
{
    /**
     * Checks if a cache item exists.
     * 
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool;

    /**
     *  Fetches a value from the pool or computes it if not present.
     * 
     *  Optional. If the value is not present in the cache, the provided
     *  callback function will be called to compute the value.
     *  The computed value will then be stored in the cache and returned.
     * 
     * @param string $key
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function get(string $key, callable $callback, ?float $beta = null, ?array &$metadata = null): mixed;

    /** 
     * Removes an item from the pool.
     * 
     * @param string $key
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function delete(string $key): bool;

    /** 
     * Stores an item in the pool.
     * 
     * @param string $key
     * @param mixed $value
     * @param int|null $ttl Time to live in seconds. Null for default.
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function set(string $key, mixed $value, ?int $ttl = null): bool;
}