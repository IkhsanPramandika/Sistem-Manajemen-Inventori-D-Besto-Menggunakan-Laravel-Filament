<?php

namespace App\Filament\Widgets;

use Closure;
use Filament\Tables;
use App\Models\BahanBaku;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class TabelBahanBaku extends BaseWidget
{
    //protected int | string | array $columnSpan = 1; // LINE CHART
    protected function getTableQuery(): Builder
    {
        return BahanBaku::query();
    }
    public function configureTable(Table $table): void
{
    $table->paginationSize(25);
}
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('Kode_bahan')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('Nama_bahan')->label('Nama Bahan')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('Total_bahan') ->label('Total Bahan Baku')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('Tanggal_bahan')->sortable()->searchable()->label('Tanggal Update Bahan'),


        ];
    }
}