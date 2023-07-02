<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Transaksi;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\LineChartWidget;

class TransaksiChart extends LineChartWidget
{
    protected static ?string $heading = 'Data Transaksi ';

    protected function getData(): array
{
    $data = Trend::model(Transaksi::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();
 
    return [
        'datasets' => [
            [
                'label' => 'Data Transaksi',
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
