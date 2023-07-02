<?php

namespace App\Filament\Resources\BahanBakuResource\Pages;

use App\Filament\Resources\BahanBakuResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBahanBaku extends EditRecord
{
    protected static string $resource = BahanBakuResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string 
    {
        return $this->getResource()::getUrl('index');
    }
}
