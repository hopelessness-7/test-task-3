<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\ChartDataService;
use Illuminate\Http\Request;

class ChartDataController extends Controller
{
    public function generateData(ChartDataService $service)
    {
        $data = $service->generate();
        return response()->json($data);
    }
}
