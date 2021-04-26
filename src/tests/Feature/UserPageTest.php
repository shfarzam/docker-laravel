<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_insert_without_token()
    {
        $response = $this->post('/api/users');

        $response->assertStatus(400);
    }

    public function test_user_list_without_token()
    {
        $response = $this->get('/api/users');

        $response->assertStatus(400);
    }

    public function test_user_insert_with_token()
    {
        $response = $this->post('/api/users');

        $response->assertStatus(400);
    }
}
