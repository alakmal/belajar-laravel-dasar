<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RedirectTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testRedirect()
    {
        $this->get("/redirect/to")
            ->assertStatus(200)
            ->assertSeeText("Redirect To");

        $this->get("/redirect/from")
            ->assertStatus(302)
            ->assertRedirect("/redirect/to");

        //
    }

    public function testRedirectName()
    {

        $this->get("/redirect/name")
            ->assertRedirect("/redirect/name/Eko")
            ->assertStatus(302)
        ;
    }

    public function testRedirectAction()
    {

        $this->get("/redirect/action")
            ->assertRedirect("/redirect/name/Eko")
        ;
    }

    public function testRedirectAway()
    {
        $this->get("/redirect/pzn")
            ->assertRedirect("https://www.programmerzamannow.com")
        ;
    }
}
