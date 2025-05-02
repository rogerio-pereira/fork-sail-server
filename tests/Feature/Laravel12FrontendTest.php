<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Laravel12FrontendTest extends TestCase
{
    public function test_it_accepts_no_frontend_and_uses_livewire()
    {
        $response = $this->get('/example-app');

        $response->assertStatus(200);
        $response->assertSee('laravel new example-app --livewire --pest --no-interaction', false);
    }

    public function test_it_accepts_frontend_livewire()
    {
        $response = $this->get('/example-app?frontend=livewire');

        $response->assertStatus(200);
        $response->assertSee('laravel new example-app --livewire --pest --no-interaction', false);
    }

    public function test_it_accepts_frontend_react()
    {
        $response = $this->get('/example-app?frontend=react');

        $response->assertStatus(200);
        $response->assertSee('laravel new example-app --react --pest --no-interaction', false);
    }

    public function test_it_accepts_frontend_vue()
    {
        $response = $this->get('/example-app?frontend=vue');

        $response->assertStatus(200);
        $response->assertSee('laravel new example-app --vue --pest --no-interaction', false);
    }
    
    public function test_it_accepts_frontend_livewire_class_components()
    {
        $response = $this->get('/example-app?frontend=livewire-class-components');

        $response->assertStatus(200);
        $response->assertSee('laravel new example-app --livewire-class-components --pest --no-interaction', false);
    }
    
    public function test_it_does_not_accept_invalid_frontend()
    {
        $response = $this->get('/example-app?frontend=invalid');

        $response->assertStatus(400);
        $response->assertSee('Invalid frontend. Please provide one supported frontend (react, vue, livewire, livewire-class-components) or leave it empty (it will use livewire).');
    }
}
