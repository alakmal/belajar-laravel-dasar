<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class InputController extends Controller
{


    public function hello(Request $request): string
    {
        $name = $request->input('name', 'Guest');

        return "Hello {$name}";
    }

    public function helloFirst(Request $request): string
    {
        $name = $request->input('name.first');

        return "Hello {$name}";
    }

    public function helloInput(Request $request): string
    {
        $input = $request->input();



        return json_encode($input);
    }

    public function arrayInput(Request $request)
    {

        $names = $request->input("products.*.name");
        return json_encode($names);
    }

    public function type(Request $request)
    {
        return  response()->json([
            "name" => $request->string("name", "Guest"),
            "nameInput" => $request->input("name", "Guest"),
            "ageInput" => $request->input("age", 0),
            "isActiveInput" => $request->input("isActive", false),
            "age" => $request->integer("age", 0),
            "isActive" => $request->boolean("isActive", false),
        ], 200);
    }
}
