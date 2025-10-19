<?php

/**
 * This file is part of the Flaphl package.
 *
 * (c) Jade Phyressi <jade@flaphl.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flaphl\Contracts\Locale;

/**
 * Interface for locale-aware components.
 *
 * @author Jade Phyressi <jade@flaphl.com>
 */
interface LocaleAwareInterface
{
    /**
     * Sets the current locale.
     *
     * @param string $locale The locale code (e.g., 'en', 'fr', 'es')
     *
     * @return void
     */
    public function setLocale(string $locale): void;

    /**
     * Gets the current locale.
     *
     * @return string The current locale code
     */
    public function getLocale(): string;

    /**
     * Gets the fallback locales.
     *
     * @return array<string> An array of fallback locale codes
     */
    public function getFallbackLocales(): array;

    /**
     * Sets the fallback locales.
     *
     * @param array<string> $locales An array of fallback locale codes
     *
     * @return void
     */
    public function setFallbackLocales(array $locales): void;
}
