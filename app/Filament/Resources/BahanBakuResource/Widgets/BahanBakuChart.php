<?php

namespace App\Filament\Resources\BahanBakuResource\Widgets;

use Filament\Widgets\PieChartWidget;

class BahanBakuChart extends PieChartWidget
{
    protected static ?string $heading = 'Chart';

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