<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;

class FileControllerTest extends TestCase
{


    public function testUpload()
    {
        // Fake disk agar tidak menyimpan file asli ke disk
        Storage::fake('public');

        $image = UploadedFile::fake()->image('avatar.jpg')
            ->size(1000);

        $response = $this->post("/file/upload", [
            "picture" => $image
        ]);

        $response
            ->assertSeeText("Ok: avatar.jpg");
        // Pastikan file berhasil diupload ke storage public
        dump(Storage::disk('public')->get("pictures/avatar.jpg"));
    }
}
