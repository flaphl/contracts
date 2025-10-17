# Changelog

All notable changes to the Flaphl Event Dispatcher Contracts package will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0] - 2025-10-17

### Added
- Initial release of Flaphl Event Dispatcher Contracts
- `EventDispatcherInterface` extending PSR-14 EventDispatcherInterface
- Enhanced `dispatch()` method with optional event name parameter
- Template support for better type safety
- PHP 8.2+ compatibility with modern type declarations
- PSR-14 Event Dispatcher compatibility
- Comprehensive PHPDoc documentation
- MIT License for open source distribution
- Composer package configuration with proper autoloading

### Features
- Extends PSR-14 `EventDispatcherInterface` for standard compliance
- Optional `$eventName` parameter for explicit event naming
- Template-based type safety for dispatched events
- Domain-specific lifecycle hooks support
- Full compatibility with existing PSR-14 implementations

### Technical
- PHP 8.2+ requirement for modern language features
- PSR-4 autoloading with `Flaphl\Contracts\EventDispatcher` namespace
- Dependency on `psr/event-dispatcher` package
- Proper return type guarantees for event objects

