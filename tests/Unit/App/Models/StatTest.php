<?php

namespace Tests\Unit\App\Models;

use App\Models\Stat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tests\Unit\App\Models\Contracts\ModelTestCase;

class StatTest extends ModelTestCase
{
    protected function model() : Model
    {
        return new Stat();
    }

    protected function expectedTableName() : string
    {
        return 'stats';
    }

    protected function expectedTraits() : array
    {
        return [
            HasFactory::class,
        ];
    }

    protected function expectedFillable() : array
    {
        return [
            'installed_at',
        ];
    }

    protected function expectedHidden() : array
    {
        return [];
    }

    protected function expectedCasts() : array
    {
        return [
            ...$this->defaultCasts(),
            'installed_at' => 'datetime:Y-m-d H:i:s',
        ];
    }
}