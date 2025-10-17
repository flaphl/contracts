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

use Psr\Cache\InvalidArgumentException;

/**
 * Allows invalidating cached items using tags.
 * 
 * @author jadebyurei <jade@flaphl.com>
 */
interface TagAwareCacheInterface extends CacheInterface
{
    /**
     * Invalidates all cache items associated with the given tags.
     * 
     * @param string|string[] $tags A tag or array of tags to invalidate.
     * @return bool True if the operation was successful, false otherwise.
     * @throws InvalidArgumentException If any of the tags are invalid.
     */
    public function invalidateTags(string|array $tags): bool;
}