# Changelog

All notable changes to Flaphl Locale Contracts will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.0.0] - 2025-10-19

### Added
- Initial release of Locale contracts
- `TranslatorInterface` with full translation and pluralization support
- `LocaleAwareInterface` for locale management
- `TranslatableInterface` for translatable entities
- `TranslatorTrait` providing default locale management implementation
- Support for translation domains (messages, validators, etc.)
- Pluralization with `transChoice()` method
- Parameter substitution in translations
- Fallback locale mechanism
- Translation catalogue access
- Dynamic translation management with `addTranslations()`
- Translation existence checking with `has()` method

### Features
- **PHP 8.2+**: Modern type hints and features
- **Framework agnostic**: Works with any PHP application
- **PSR compliance**: Follows PSR-4 autoloading standards
- **Comprehensive**: Covers all common i18n/l10n use cases
- **Flexible**: Support for domains, parameters, and fallbacks
- **Testable**: Clear interfaces for easy mocking and testing

## License

MIT License. See LICENSE file for details.
