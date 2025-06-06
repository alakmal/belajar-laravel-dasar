<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RequestTest extends TestCase
{


    public function testRequest()
    {

        $this->get("/controller/hello/request", [
            "Accept" => "plain/text",
        ])
            ->assertStatus(200)
            ->assertSeeText("controller/hello/request")
            ->assertSeeText("GET")
            ->assertSeeText("http://localhost/controller/hello/request");
    }
}
