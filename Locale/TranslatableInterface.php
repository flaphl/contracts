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
 * Interface for translatable entities.
 *
 * @author Jade Phyressi <jade@flaphl.com>
 */
interface TranslatableInterface
{
    /**
     * Gets the translatable identifier.
     *
     * @return string The translation identifier
     */
    public function getTranslationId(): string;

    /**
     * Gets the translation domain for this entity.
     *
     * @return string The translation domain
     */
    public function getTranslationDomain(): string;

    /**
     * Gets the translation parameters for this entity.
     *
     * @return array<string, mixed> An array of parameters for translation
     */
    public function getTranslationParameters(): array;

    /**
     * Sets a translation for a specific locale.
     *
     * @param string $locale The locale code
     * @param string $value  The translated value
     *
     * @return void
     */
    public function setTranslation(string $locale, string $value): void;

    /**
     * Gets the translation for a specific locale.
     *
     * @param string $locale The locale code
     *
     * @return string|null The translated value or null if not found
     */
    public function getTranslation(string $locale): ?string;

    /**
     * Checks if a translation exists for a specific locale.
     *
     * @param string $locale The locale code
     *
     * @return bool Whether the translation exists
     */
    public function hasTranslation(string $locale): bool;

    /**
     * Gets all available translations.
     *
     * @return array<string, string> An array of locale => translation pairs
     */
    public function getTranslations(): array;
}
