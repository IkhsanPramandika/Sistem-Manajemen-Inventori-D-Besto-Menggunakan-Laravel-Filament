<?php

namespace App\Filament\Resources\WidgetsResource\Widgets;

use Filament\Widgets\PieChartWidget;

class BakuChart extends PieChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }
}
