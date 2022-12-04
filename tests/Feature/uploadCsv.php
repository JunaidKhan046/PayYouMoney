<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class uploadCsv extends TestCase
{
   
    /**
     * This function is used to test csv dump
     */

    public function test_new_csv_upload(){
        $response = $this->get('/api/auth/store-csv');

        $response->assertStatus(200);
     }
}
