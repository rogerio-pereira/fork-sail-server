<?php

namespace Tests\Feature;

use App\Models\Stat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class StatsTest extends TestCase
{
    public function testShouldCreateStatWhenAccessScript()
    {
        Carbon::setTestNow('2025-05-02 21:23:00');
        $this->assertDatabaseCount('stats', 0);
        $this->assertDatabaseMissing('stats', ['installed_at' => '2025-05-02 21:23:00']);

        $response = $this->get('/example-app');

        $this->assertDatabaseCount('stats', 1);
        $this->assertDatabaseHas('stats', ['installed_at' => '2025-05-02 21:23:00']);
    }
}
