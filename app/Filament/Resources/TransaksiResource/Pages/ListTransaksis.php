<?php

namespace App\Filament\Resources\TransaksiResource\Pages;


use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\TransaksiResource;

class ListTransaksis extends ListRecords
{
    protected static string $resource = TransaksiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\ButtonAction::make('Laporan pdf')->url(fn()=>route('download.tes'))
            ->openUrlInNewTab(),
        ];
    }
}
