# Flaphl Locale Contracts

A set of internationalization and localization abstractions for PHP 8.2+.

## Installation

```bash
composer require flaphl/locale-contracts
```

## Interfaces

### `TranslatorInterface`

Core interface for translating messages with support for pluralization, domains, and locales.

```php
use Flaphl\Contracts\Locale\TranslatorInterface;

class MyTranslator implements TranslatorInterface
{
    public function trans(string $id, array $parameters = [], ?string $domain = null, ?string $locale = null): string
    {
        // Translate message
        return $this->catalogue[$locale][$domain][$id] ?? $id;
    }
    
    public function transChoice(string $id, int $number, array $parameters = [], ?string $domain = null, ?string $locale = null): string
    {
        // Handle pluralization
        return $this->selectMessage($id, $number, $locale, $domain);
    }
}
```

### `LocaleAwareInterface`

Interface for components that need locale management.

```php
use Flaphl\Contracts\Locale\LocaleAwareInterface;

class MyService implements LocaleAwareInterface
{
    use TranslatorTrait; // Provides default implementation
    
    public function process(): void
    {
        $currentLocale = $this->getLocale(); // 'en', 'fr', etc.
        // Process with locale awareness
    }
}
```

### `TranslatableInterface`

Interface for entities that can be translated.

```php
use Flaphl\Contracts\Locale\TranslatableInterface;

class Product implements TranslatableInterface
{
    private array $translations = [];
    
    public function setTranslation(string $locale, string $value): void
    {
        $this->translations[$locale] = $value;
    }
    
    public function getTranslation(string $locale): ?string
    {
        return $this->translations[$locale] ?? null;
    }
    
    public function getTranslationId(): string
    {
        return 'product.name.' . $this->id;
    }
}
```

## Features

- **Locale Management**: Current locale and fallback locales
- **Translation Domains**: Organize translations by domain (messages, validators, etc.)
- **Pluralization**: Handle singular/plural forms with `transChoice()`
- **Parameters**: Variable substitution in translations
- **Catalogues**: Access translation catalogues programmatically
- **Translatable Entities**: First-class support for translatable objects

## Usage Example

```php
use Flaphl\Contracts\Locale\TranslatorInterface;

class MyController
{
    public function __construct(
        private TranslatorInterface $translator
    ) {}
    
    public function welcome(): string
    {
        // Simple translation
        $message = $this->translator->trans('welcome.message');
        
        // With parameters
        $greeting = $this->translator->trans(
            'welcome.greeting',
            ['name' => 'John']
        );
        
        // Pluralization
        $itemCount = $this->translator->transChoice(
            'items.count',
            5,
            ['count' => 5]
        );
        
        // Different domain
        $error = $this->translator->trans(
            'field.required',
            [],
            'validators'
        );
        
        // Specific locale
        $french = $this->translator->trans(
            'hello',
            [],
            'messages',
            'fr'
        );
        
        return $message;
    }
}
```

## Translation Files Example

```php
// messages.en.php
return [
    'welcome.message' => 'Welcome to our application!',
    'welcome.greeting' => 'Hello, :name!',
    'items.count' => '{0} No items|{1} One item|[2,*] :count items',
];

// validators.en.php
return [
    'field.required' => 'This field is required',
    'email.invalid' => 'Please provide a valid email',
];
```

## Fallback Locales

```php
$translator->setFallbackLocales(['en', 'fr']);
$translator->setLocale('de');

// If 'de' translation not found, tries 'en', then 'fr'
$message = $translator->trans('welcome.message');
```

## License

MIT License. See LICENSE file for details.
