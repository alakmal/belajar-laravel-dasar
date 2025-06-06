<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function testBasicRouting()
    {

        $this->get("/pzn")
            ->assertStatus(200)
            ->assertSeeText("Hello Programmer Zaman Now");
    }

    public function testRedirect()
    {
        $this->get("/youtube")
            ->assertStatus(302)
            ->assertRedirect("/pzn");

        $this->get("/pzn")
            ->assertStatus(200)
            ->assertSeeText("Hello Programmer Zaman Now");
    }

    public function testRouteParameter()
    {
        $this->get("/products/1")
            ->assertStatus(200)
            ->assertSeeText("Products : 1");

        $this->get("/products/2/items/xxx")
            ->assertStatus(200)
            ->assertSeeText("Products : 2, Items : xxx");
    }

    public function testRouteParameterRegex()
    {
        $this->get("/categories/1")
            ->assertStatus(200)
            ->assertSeeText("Categories : 1");

        $this->get("/categories/abc")
            ->assertStatus(404);

        $this->get("/categories/2")
            ->assertStatus(200)
            ->assertSeeText("Categories : 2");
    }

    public function testNamed()
    {

        $this->get("/produk/12345")->assertSeeText("products/12345");

        $this->get("/produk-redirect/12345")
            ->assertStatus(302)
            ->assertRedirect("products/12345");
    }
}
