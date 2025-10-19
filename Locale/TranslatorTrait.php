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
 * Trait providing default implementation for LocaleAwareInterface.
 *
 * @author Jade Phyressi <jade@flaphl.com>
 */
trait TranslatorTrait
{
    /**
     * The current locale.
     *
     * @var string
     */
    protected string $locale = 'en';

    /**
     * The fallback locales.
     *
     * @var array<string>
     */
    protected array $fallbackLocales = ['en'];

    /**
     * Sets the current locale.
     *
     * @param string $locale The locale code
     *
     * @return void
     */
    public function setLocale(string $locale): void
    {
        $this->locale = $locale;
    }

    /**
     * Gets the current locale.
     *
     * @return string The current locale code
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * Gets the fallback locales.
     *
     * @return array<string> An array of fallback locale codes
     */
    public function getFallbackLocales(): array
    {
        return $this->fallbackLocales;
    }

    /**
     * Sets the fallback locales.
     *
     * @param array<string> $locales An array of fallback locale codes
     *
     * @return void
     */
    public function setFallbackLocales(array $locales): void
    {
        $this->fallbackLocales = $locales;
    }
}
