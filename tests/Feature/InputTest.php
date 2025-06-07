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

    public function testNestedInput()
    {

        $this->post("/input/hello/first", [
            "name" => [
                "first" => "Eko",
                "last" => "Kurniawan"
            ]
        ],)
            ->assertSeeText("Hello Eko")
            ->assertStatus(200)

        ;
    }

    public function testInputAll()
    {
        $this->post("/input/hello/input", [
            "name" => "Eko",
            "age" => 30,
            "address" => "Bandung"
        ],)
            ->assertSeeText("name")
            ->assertSeeText("Eko")
            ->assertSeeText("age")
            ->assertSeeText("30")
            ->assertSeeText("Bandung")
            ->assertStatus(200)
            ->assertJson([
                "name" => "Eko",
                "age" => 30,
                "address" => "Bandung"
            ])
        ;
    }

    public function testArrayInput()
    {
        $this->post("/input/hello/array", [
            "products" => [
                ["name" => "Laptop"],
                ["name" => "Handphone"],
                ["name" => "Tablet"]
            ]
        ],)
            ->assertSeeText("Laptop")
            ->assertSeeText("Handphone")
            ->assertSeeText("Tablet")
            ->assertStatus(200)
            ->assertJson([
                "0" => "Laptop",
                "1" => "Handphone",
                "2" => "Tablet"
            ])
        ;
    }

    public function testTypeInput()
    {
        $response =  $this->post("/input/type", [
            "name" => "Eko",
            "age" => "30",
            "isActive" => "true"
        ],);

        $response
            ->assertStatus(200)
            ->assertJson([
                "name" => "Eko",
                "age" => 30,
                "isActive" => true
            ])
            ->assertHeader(
                "Content-Type",
                "application/json"
            );
    }
}
