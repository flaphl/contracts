<?php

/**
 * This file is part of the Flaphl package.
 *
 * (c) Jade Phyressi <jade@flaphl.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flaphl\Contracts\Locale\Tests;

use Flaphl\Contracts\Locale\LocaleAwareInterface;
use Flaphl\Contracts\Locale\TranslatorInterface;
use Flaphl\Contracts\Locale\TranslatorTrait;
use PHPUnit\Framework\TestCase;

class TranslatorTest extends TestCase
{
    public function testTranslatorInterfaceExists(): void
    {
        $this->assertTrue(interface_exists(TranslatorInterface::class));
    }

    public function testTranslatorExtendsLocaleAware(): void
    {
        $reflection = new \ReflectionClass(TranslatorInterface::class);
        $this->assertTrue($reflection->implementsInterface(LocaleAwareInterface::class));
    }

    public function testTranslatorHasRequiredMethods(): void
    {
        $reflection = new \ReflectionClass(TranslatorInterface::class);
        
        $this->assertTrue($reflection->hasMethod('trans'));
        $this->assertTrue($reflection->hasMethod('transChoice'));
        $this->assertTrue($reflection->hasMethod('getDefaultDomain'));
        $this->assertTrue($reflection->hasMethod('setDefaultDomain'));
        $this->assertTrue($reflection->hasMethod('has'));
        $this->assertTrue($reflection->hasMethod('getCatalogue'));
        $this->assertTrue($reflection->hasMethod('addTranslations'));
    }

    public function testLocaleAwareInterfaceExists(): void
    {
        $this->assertTrue(interface_exists(LocaleAwareInterface::class));
    }

    public function testLocaleAwareHasRequiredMethods(): void
    {
        $reflection = new \ReflectionClass(LocaleAwareInterface::class);
        
        $this->assertTrue($reflection->hasMethod('setLocale'));
        $this->assertTrue($reflection->hasMethod('getLocale'));
        $this->assertTrue($reflection->hasMethod('getFallbackLocales'));
        $this->assertTrue($reflection->hasMethod('setFallbackLocales'));
    }

    public function testTranslatorTraitExists(): void
    {
        $this->assertTrue(trait_exists(TranslatorTrait::class));
    }

    public function testTranslatorTraitProvidesLocaleManagement(): void
    {
        $implementation = new class {
            use TranslatorTrait;
        };

        $this->assertEquals('en', $implementation->getLocale());
        
        $implementation->setLocale('fr');
        $this->assertEquals('fr', $implementation->getLocale());
        
        $this->assertEquals(['en'], $implementation->getFallbackLocales());
        
        $implementation->setFallbackLocales(['en', 'fr', 'es']);
        $this->assertEquals(['en', 'fr', 'es'], $implementation->getFallbackLocales());
    }

    public function testTransMethodSignature(): void
    {
        $reflection = new \ReflectionClass(TranslatorInterface::class);
        $method = $reflection->getMethod('trans');
        
        $this->assertEquals('trans', $method->getName());
        $this->assertEquals(4, $method->getNumberOfParameters());
        
        $params = $method->getParameters();
        $this->assertEquals('id', $params[0]->getName());
        $this->assertEquals('parameters', $params[1]->getName());
        $this->assertEquals('domain', $params[2]->getName());
        $this->assertEquals('locale', $params[3]->getName());
    }

    public function testTransChoiceMethodSignature(): void
    {
        $reflection = new \ReflectionClass(TranslatorInterface::class);
        $method = $reflection->getMethod('transChoice');
        
        $this->assertEquals('transChoice', $method->getName());
        $this->assertEquals(5, $method->getNumberOfParameters());
        
        $params = $method->getParameters();
        $this->assertEquals('id', $params[0]->getName());
        $this->assertEquals('number', $params[1]->getName());
        $this->assertEquals('parameters', $params[2]->getName());
        $this->assertEquals('domain', $params[3]->getName());
        $this->assertEquals('locale', $params[4]->getName());
    }
}
