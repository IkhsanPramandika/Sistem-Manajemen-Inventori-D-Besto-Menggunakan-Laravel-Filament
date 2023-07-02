<?php

namespace App\Filament\Resources\BahanBakuResource\Pages;

use App\Filament\Resources\BahanBakuResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBahanBaku extends CreateRecord
{
    protected static string $resource = BahanBakuResource::class;
    protected function getRedirectUrl(): string 
    {
        return $this->getResource()::getUrl('index');
    }
}
