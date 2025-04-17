<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Laravel12AuthTest extends TestCase
{
    public function test_it_accepts_no_authentication()
    {
        $response = $this->get('/example-app');

        $response->assertStatus(200);
        $response->assertSee('laravel new example-app --livewire --no-interaction', false);
    }

    public function test_it_accepts_auth_workos()
    {
        $response = $this->get('/example-app?auth=workos');

        $response->assertStatus(200);
        $response->assertSee('laravel new example-app --livewire --workos --no-interaction', false);
    }
    
    public function test_it_does_not_accept_invalid_auth()
    {
        $response = $this->get('/example-app?auth=invalid');

        $response->assertStatus(400);
        $response->assertSee('Invalid Authentication Provider. Please provide one supported Authentication Provider (workos) or leave it empty (it will use laravel).');
    }
}
