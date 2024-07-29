<?php

namespace App\Services;

use App\Models\City;
use App\Models\Participant;
use Illuminate\Support\Facades\DB;

class ChartDataService
{
    public function generate(): array
    {
        $data = [];

        // Пол
        $data['gender'] = Participant::selectRaw('gender, COUNT(*) as total')->groupBy('gender')->get()->map(function($item) {
            return [
                'label' => $item->gender,
                'total' => $item->total,
            ];
        });

        // Возраст
        $data['age'] = Participant::selectRaw("
                CASE
                    WHEN age BETWEEN 18 AND 24 THEN '18-24'
                    WHEN age BETWEEN 25 AND 32 THEN '25-32'
                    WHEN age BETWEEN 33 AND 40 THEN '33-40'
                    WHEN age BETWEEN 41 AND 45 THEN '41-45'
                    ELSE '>45'
                END as age_range,
                COUNT(*) as total
            ")
            ->groupBy('age_range')
            ->get()
            ->map(function($item) {
                return [
                    'label' => $item->age_range,
                    'total' => $item->total,
                ];
            });

        // Город

        $data['city'] = City::all()->map(function($city) {
            return [
                'label' => $city->name,
                'total' => $city->participants->count(),
            ];
        });

        // Лучшие показатели
        $data['top_performers'] = Participant::orderBy(DB::raw('RAND()'))->take(3)->get(['name', 'emotional_intelligence'])->map(function($item) {
            return [
                'name' => $item->name,
                'emotional_intelligence' => $item->emotional_intelligence,
            ];
        });

        return $data;
    }
}
