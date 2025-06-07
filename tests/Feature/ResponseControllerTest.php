<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testResponse()
    {

        $this->get("/response/hello")
            ->assertStatus(200)
            ->assertSeeText("Hello Response");
    }

    public function testHeader()
    {
        $this->get("/response/header")
            ->assertStatus(200)
            ->assertHeader("Content-Type", "application/json")
            ->assertHeader("X-author", "Programmer Zaman Now")
            ->assertHeader("X-App", "Belajar Laravel")
            ->assertJson([
                "firstName" => "Eko",
                "lastName" => "Khannedy"
            ]);
    }
}
