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
use Psr\Cache\InvalidArgumentException;
use Psr\Cache\CacheException;

/**
 * Augments the PSR-6 CacheItemInterface with additional methods.
 * @author jadebyurei <jade@flaphl.com>
 */

interface ItemInterface extends CacheItemInterface 
{
    /**
     * Summary of METADATA_CTIME, the creation time of the cache item in milliseconds.
     * @var string
     */
    public const METADATA_CTIME = 'ctime';

    /**
     * Summary of METADATA_EXPIRATION, 
     * @var string
     */
    public const METADATA_EXPIRATION = 'expiration';

    /**
     * Summary of METADATA_TAGS
     * @var string
     */
    public const METADATA_TAGS = 'tags';

    /**
     * Summary of METADATA_OWNER, the owner of the cache item.
     * @var string
     */
    public const METADATA_OWNER = 'owner';

    /**
     * Summary of RESERVED_CHARACTERS, characters not allowed in cache keys or tags.
     * @var string
     */
    public const RESERVED_CHARACTERS = '{}()/\@:';

    /**
     * Add a tag to a cache item.
     * 
     * Tags are strings that follow the same validation rules as cache keys.
     * 
     * @param string|string[] $tags Tag or array of tags to add.
     * @return static
     * @throws InvalidArgumentException If the tag is not valid.
     * @throws CacheException When the item comes from a cache pool that does not support tagging.
     */
    public function tag(string|iterable $tags): static;

    /**
     * Returns a list of metadata info that was saved alongside with the cache value.
     * 
     * See ItemInterface::METADATA_* constants for keys that may be present in the returned array.
     */
    public function getMetadata(): array;
}