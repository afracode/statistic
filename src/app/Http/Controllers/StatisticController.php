<?php

namespace Afracode\Statistic\App\Controllers;

use Afracode\Statistic\App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function statistics(Request $request, $sort = null)
    {
        $query = Statistic::query()
            ->select(\DB::raw('count( DISTINCT ip) as count '), \DB::raw('Date(created_at) as labels'))
            ->groupBy([\DB::raw('Date(created_at)')])
            ->orderBy('created_at', 'desc');


        switch ($sort) {
            case "month":
                $query = $query
                    ->whereMonth('created_at', now()->month);
            case "year":
                $query = $query
                    ->whereYear('created_at', now()->year);
        }


        $result['count'] = $query->pluck('count');
        $result['labels'] = $query->pluck('labels');


        return $result;

    }
}
