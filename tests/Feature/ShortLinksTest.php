<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class ShortLinksTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_link_form()
    {
        $response = $this->get('/links');
        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_link()
    {
        $originalLink = "https://youtube.com";
        $response = $this->post('/links', ['original_link' => $originalLink]);

        $response->assertStatus(Response::HTTP_FOUND);
    }
}
