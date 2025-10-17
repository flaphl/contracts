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
 * Interface for a cache item pool that supports retagging.
 *
 * @author jadebyurei <jade@flaphl.com>
 */
interface RetagableInterface
{
    /**
     * Retags an item in the pool.
     *
     * @param string $key
     * @param array $tags
     * @return bool
     * @throws InvalidArgumentException
     */
    public function retag(string $key, array $tags): bool;
}