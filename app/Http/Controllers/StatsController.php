<?php

namespace App\Http\Controllers;

use App\Models\Stat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class StatsController extends Controller
{
    public function index()
    {
        if(Cache::has('stats')) {
            $stats = Cache::get('stats');
        }
        else {
            $stats = $this->loadStats();
        }

        return Inertia::render('Stats', $stats);
    }

    private function loadStats()
    {
        $lastMonth = Carbon::now()
                        ->subDays(30)
                        ->startOfDay();
        $startOfYear = Carbon::now()
                        ->startOfYear();

        $total = Stat::count();
        $totalYear = Stat::whereDate('installed_at', '>', $startOfYear)->count();
        $totalMonth = 0;

        $downloads = Stat::select([
                            DB::raw("date(installed_at) as date"),
                            DB::raw('COUNT(*) as downloads')
                        ])
                        ->whereDate('installed_at', '>', $lastMonth)
                        ->groupBy('date')
                        ->orderBy('date')
                        ->get();

        foreach($downloads as $day) {
            $totalMonth += $day->downloads;
        }

        $stats = compact('total', 'totalYear', 'totalMonth', 'downloads');

        $endOfDay = Carbon::now()->endOfDay();

        Cache::put('stats', $stats, $endOfDay);

        return $stats;
    }
}
