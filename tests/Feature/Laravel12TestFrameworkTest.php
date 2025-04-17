<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Laravel12TestFrameworkTest extends TestCase
{
    public function test_it_accepts_no_authentication_and_uses_pest()
    {
        $response = $this->get('/example-app');

        $response->assertStatus(200);
        $response->assertSee('laravel new example-app --livewire --pest --no-interaction', false);
    }

    public function test_it_accepts_test_pest()
    {
        $response = $this->get('/example-app?tests=pest');

        $response->assertStatus(200);
        $response->assertSee('laravel new example-app --livewire --pest --no-interaction', false);
    }

    public function test_it_accepts_test_phpunit()
    {
        $response = $this->get('/example-app?tests=phpunit');

        $response->assertStatus(200);
        $response->assertSee('laravel new example-app --livewire --phpunit --no-interaction', false);
    }
    
    public function test_it_does_not_accept_invalid_test()
    {
        $response = $this->get('/example-app?tests=invalid');

        $response->assertStatus(400);
        $response->assertSee('Invalid testing framework. Please provide one supported testing framework (phpunit, pest) or leave it empty (it will use pest).');
    }
}
