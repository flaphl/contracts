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
 * Interface for translating messages.
 *
 * @author Jade Phyressi <jade@flaphl.com>
 */
interface TranslatorInterface extends LocaleAwareInterface
{
    /**
     * Translates the given message.
     *
     * @param string      $id         The message id (may also be an object that can be cast to string)
     * @param array       $parameters An array of parameters for the message
     * @param string|null $domain     The domain for the message or null to use the default
     * @param string|null $locale     The locale or null to use the default
     *
     * @return string The translated string
     */
    public function trans(string $id, array $parameters = [], ?string $domain = null, ?string $locale = null): string;

    /**
     * Translates the given choice message by choosing a translation according to a number.
     *
     * @param string      $id         The message id (may also be an object that can be cast to string)
     * @param int         $number     The number to use to find the index of the message
     * @param array       $parameters An array of parameters for the message
     * @param string|null $domain     The domain for the message or null to use the default
     * @param string|null $locale     The locale or null to use the default
     *
     * @return string The translated string
     */
    public function transChoice(string $id, int $number, array $parameters = [], ?string $domain = null, ?string $locale = null): string;

    /**
     * Gets the default domain.
     *
     * @return string The default domain
     */
    public function getDefaultDomain(): string;

    /**
     * Sets the default domain.
     *
     * @param string $domain The default domain
     *
     * @return void
     */
    public function setDefaultDomain(string $domain): void;

    /**
     * Checks if the given message has a translation.
     *
     * @param string      $id     The message id
     * @param string|null $domain The domain for the message or null to use the default
     * @param string|null $locale The locale or null to use the default
     *
     * @return bool Whether the message has a translation
     */
    public function has(string $id, ?string $domain = null, ?string $locale = null): bool;

    /**
     * Gets the catalogue for the given locale.
     *
     * @param string|null $locale The locale or null to use the default
     *
     * @return array The catalogue
     */
    public function getCatalogue(?string $locale = null): array;

    /**
     * Adds translations from an array.
     *
     * @param array       $messages The translations
     * @param string|null $domain   The domain for the messages or null to use the default
     * @param string|null $locale   The locale or null to use the default
     *
     * @return void
     */
    public function addTranslations(array $messages, ?string $domain = null, ?string $locale = null): void;
}
