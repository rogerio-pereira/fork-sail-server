<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Laravel12Test extends TestCase
{
    public function test_it_should_update_laravel_installer()
    {
        $response = $this->get('/example-app');

        $response->assertStatus(200);
        $response->assertSee('bash -c "composer global require laravel/installer && rm /usr/bin/laravel && ln -s ~/.composer/vendor/bin/laravel /usr/bin/laravel && laravel new example-app --livewire --pest --no-interaction && cd example-app && php ./artisan sail:install --with=mysql,redis,meilisearch,mailpit,selenium "', false);
    }
}
