<?php

namespace App\Http\Controllers;

use App\Models\Stat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home');
    }

    private function formatNumber(int $number)
    {
        $formater = new \NumberFormatter('en_US', \NumberFormatter::PADDING_POSITION);

        return $formater->format($number);
    }
}
