<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Data\Foo;
use App\Data\Bar;
use App\Service\HelloService;
use App\Service\HelloServiceIndonesia;

class DependencyInjectionTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function testDependencyInjection()
    {
        $foo = $this->app->make(Foo::class);
        // yang foo sudah didaftarkan kedalam service provider
        $bar = $this->app->make(Bar::class);

        $this->assertEquals('Foo and Bar', $bar->bar());
        self::assertSame($foo, $bar->foo);
    }

    public function testCreateDependency()
    {
        self::markTestSkipped();

        $foo = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);
        self::assertEquals('Foo', $foo->foo());
        self::assertEquals('Foo', $foo2->foo());
        $this->assertNotSame($foo, $foo2, 'Dependency injection should create a new instance each time');
    }

    public function testBind()
    {

        self::markTestSkipped();
        $foo = $this->app->make(Foo::class);
        $bar = new Bar($foo);

        $this->assertEquals("Foo and Bar", $bar->bar());
    }

    public function testDependencyInjectionInClosure()
    {
        $this->app->singleton(Foo::class, function ($app) {
            return new Foo();
        });

        $this->app->singleton(Bar::class, function ($app) {
            return new Bar($app->make(Foo::class));
        });

        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($bar1, $bar2);
    }

    public function testHelloService()
    {
        $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);

        $helloService = $this->app->make(HelloService::class);
        self::assertEquals("Hallo Eko", $helloService->hello("Eko"));
    }
}
