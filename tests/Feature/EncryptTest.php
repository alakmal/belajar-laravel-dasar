<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EncryptTest extends TestCase
{


    public function testEnccrypt()
    {

        $encrypt = encrypt('Eko Kurniawan');
        $decrypt = decrypt($encrypt);
        $this->assertEquals('Eko Kurniawan', $decrypt);
    }
}
