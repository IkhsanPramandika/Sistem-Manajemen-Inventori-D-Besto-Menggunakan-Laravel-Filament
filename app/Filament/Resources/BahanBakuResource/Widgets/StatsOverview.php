<?php

namespace App\Filament\Resources\BahanBakuResource\Widgets;

use App\Models\BahanBaku;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use App\Filament\Resources\BahanBakuResource\Widgets\StatsOverview;

class StatsOverview extends BaseWidget

{
   // protected static string $view = 'filament.resources.bahan-baku-resource.widgets.stats-overview';
    //protected int | string | array $columnSpan = 1; // LINE CHART 
    protected function getCards(): array
    {
        $totalBahanBaku = BahanBaku::sum('Total_bahan');
        return [
            
            Card::make('Total Bahan Baku', BahanBaku::all()->count())
            ->description('Jumlah Bahan Baku')
            ->descriptionIcon('heroicon-s-cube'),
            Card::make('Total Bahan Baku', $totalBahanBaku)
            ->description('Total bahan baku')
            ->descriptionIcon('heroicon-s-cube'),

            
            
        ];
    }
}
