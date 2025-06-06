<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class FacadeTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function testConfig()
    {
        $firstName1 = config("contoh.author.first");
        $firstName2 = Config::get("contoh.author.first");
        self::assertEquals($firstName1, $firstName2);
    }

    public function testConfigDependency()
    {
        $firstName = $this->app->make("config");
        $firstName1 = $firstName->get("contoh.author.first");
        $firstName2 = Config::get("contoh.author.first");
        self::assertEquals($firstName1, $firstName2);
    }

    public function testConfigMock()
    {

        Config::shouldReceive('get')
            ->with('contoh.author.first')
            ->andReturn('Mocked First Name');
        $firstName = Config::get('contoh.author.first');
        self::assertEquals('Mocked First Name', $firstName);
    }
}
