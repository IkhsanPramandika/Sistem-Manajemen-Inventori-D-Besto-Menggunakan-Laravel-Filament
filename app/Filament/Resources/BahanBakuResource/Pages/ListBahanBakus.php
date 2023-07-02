<?php

namespace App\Filament\Resources\BahanBakuResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\BahanBakuResource;
use App\Filament\Resources\BahanBakuResource\Widgets\StatsOverview;

class ListBahanBakus extends ListRecords
{
    protected static string $resource = BahanBakuResource::class;

    

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
   
}
