<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputTest extends TestCase
{
    /**
     * A basic feature test example.
     */


    public function testInput()
    {

        $this->post("/input/hello", [
            "name" => "Eko"
        ],)
            ->assertSeeText("Hello Eko")
            ->assertStatus(200)

        ;
    }
}
