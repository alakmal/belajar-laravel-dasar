<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    //

    public function upload(Request $request)
    {

        $picture = $request->file("picture");
        $picture->StoragePubliclyAs("pictures", $picture->getClientOriginalName(), "public");

        return "Ok: " . $picture->getClientOriginalName();
    }
}
