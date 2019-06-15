<?php

namespace Tests\Feature;


use Tests\TestCase;


class HomeTest extends TestCase
{
    public function testStatusCode()
    {
        $response = $this->get('/home');
        
        $response->assertStatus(200);
        
    }
    
    public function testBoy()
    {
        
        $response = $this->get('/home');
        
        $response->assertSeeText("こんにちは！");
    }
    /**
     * A basic test example.
     *
     * @return void
     */
   
}
