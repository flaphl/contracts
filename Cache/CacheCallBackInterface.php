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

use Psr\Cache\CacheItemInterface;

/**
 * Computes and returns the cached value of an item.
 *
 * @author jadebyurei <jade@flaphl.com>
 */
interface CacheCallBackInterface
{
    /**
     * @param CacheItemInterface|ItemInterface $item The cache item.
     * @param bool &$save Should be set to false when the computed value should not be saved.
     * 
     * @return  mixed The computed value to be cached.
     * @author jadebyurei <jade@flaphl.com>
     */
    public function __invoke(CacheItemInterface|ItemInterface $item, bool &$save = true): mixed;
}