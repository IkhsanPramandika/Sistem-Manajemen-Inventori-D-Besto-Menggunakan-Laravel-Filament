<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\BahanBaku;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\LineChartWidget;

class BahanBakuChart extends LineChartWidget
{
    protected static ?string $heading = 'Data Bahan Baku';

    protected function getData(): array
    {
        $data = Trend::model(BahanBaku::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();
     
        return [
            'datasets' => [
                [
                    'label' => 'Data persediaan bahan baku',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(function (TrendValue $value) {
             $date = Carbon::createFromFormat('Y-m', $value->date);
                $formattedDate = $date->format('M');
    
                return $formattedDate;
            }),
        ];
    }
    }
