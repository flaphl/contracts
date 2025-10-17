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
use Psr\Log\LoggerInterface;

// help opcache.preload discover always-needed symbols
class_exists(InvalidArgumentException::class);

/**
 * Implementation of CacheInterface for PSR-6 CacheItemPoolInterface.
 * 
 * This trait provides default implementations for common cache operations.
 * It can be used by any class implementing CacheInterface to reduce boilerplate code.
 * 
 * @author jadebyurei <jade@flaphl.com>
 */

trait CachableTrait
{
    /**
     * Checks if a cache item exists.
     * @param string $key
     * @return bool
     * @throws InvalidArgumentException
     */
    public function has(string $key): bool
    {

        return $this->getItem($key)->isHit();
    }

    public function get(string $key, callable $callback, ?float $beta = null, ?array &$metadata = null): mixed
    {
       return $this->doGet($this, $key, $callback, $beta, $metadata);
    }
    /** 
     * Removes an item from the pool.
     * 
     * @param string $key
     * @return bool
     * @throws InvalidArgumentException
     */
    public function delete(string $key): bool
    {

        return $this->deleteItem($key);
    }


    private function doGet(PsrCacheItemPoolInterface $pool, string $key, callable $callback, ?float $beta = null, ?array &$metadata = null, ?LoggerInterface $logger = null): mixed
    {
        if (0 > $beta ??= 1.0) {
            throw new class(\sprintf('The $beta value must be non-negative, %f given.', $beta)) extends \InvalidArgumentException implements InvalidArgumentException {};
        }

        $item = $pool->getItem($key);
        $recompute = !$item->isHit() || \INF === $beta;
        $metadata = $item instanceof ItemInterface ? $item->getMetadata() : [];

        if (!$recompute && $metadata) {
            $expiration = $metadata[ItemInterface::METADATA_EXPIRATION] ?? false;
            $ctime = $metadata[ItemInterface::METADATA_CTIME] ?? false;

            if ($recompute = $ctime && $expiration && $expiration <= ($now = microtime(true)) - $ctime / 1000 * $beta * log(random_int(1, \PHP_INT_MAX) / \PHP_INT_MAX)) {
                // force applying defaultLifetime to expiration.
                $item->expiresAt(null);
                $logger?->info('Cache stampede detected for key "{key}". Recomputing value.', [
                    'key' => $key,
                    'delta' => \sprintf('%.1f', $expiration - $now),
                ]);
            }
        }

        if ($recompute) {
            $save = true;
            $item->set($callback($item, $save));
            if ($save) {
                $pool->save($item);
            }
        }

        return $item->get();
    }

}