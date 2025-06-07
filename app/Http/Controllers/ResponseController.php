<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResponseController extends Controller
{
    //

    public function response(Request $request): Response
    {


        return response("Hello Response");
    }

    public function header(Request $request): Response
    {
        $body = ["firstName" => "Eko", "lastName" => "Khannedy"];
        return response(json_encode($body))
            ->header("Content-Type", "application/json")
            ->withHeaders(["X-author" => 'Programmer Zaman Now', "X-App" => "Belajar Laravel"]);
    }
}
