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
 * Enables namespace-based invalidation by prefixing keys with backend-native namespace separators.
 * 
 * Note: calling 'withSubNamespace()' MUST NOT mutate the pool, but return a new instance with the updated namespace.
 * 
 * When tags are used, they MUST ignore sub-namespaces and only consider the top-level namespace.
 *
 * @author jadebyurei <jade@flaphl.com>
 */
interface NamespacedPoolInterface 
{
    /**
     * @throws InvalidArgumentException If the namespace contains characters found in ItemInterface::RESERVED_CHARACTERS.
     */
    public function withSubNamespace(string $namespace): static;
}