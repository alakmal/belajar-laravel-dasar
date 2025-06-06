<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControllerTest extends TestCase
{

    public function testHelloController()
    {
        $response = $this->get('/controller/hello/Eko');

        $response->assertStatus(200)
            ->assertSeeText('Hallo Eko');
    }
}
