<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class bookTest extends TestCase
{
   
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function testRoutes(){
        
        $response = $this->get('all_books');
        $response ->assertStatus(200);
        
        $response = $this->get('test');
        $response ->assertStatus(200);
        
    }
    
}
