<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\BahanBaku;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\DateTimeColumn;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\BahanBakuResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BahanBakuResource\RelationManagers;
use App\Filament\Resources\BahanBakuResource\Widgets\StatsOverview;

class BahanBakuResource extends Resource

{
    protected static ?string $model = BahanBaku::class;

    protected static ?string $recordTitleAttribute = 'Nama_bahan';

    protected static ?string $navigationGroup = 'Manajemen';

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
    return $form
        ->schema([
            Card::make()
                ->schema([
                        TextInput::make('Kode_bahan')->required()->unique(ignorable:fn($record)=>$record),
                        TextInput::make('Nama_bahan')->required(),
                        TextInput::make('Total_bahan')->required(),
                        DateTimePicker::make('Tanggal_bahan')->hoursStep(2)->minutesStep(15)->secondsStep(10)->required(),
                    ])
                  
            ]);
    }

   public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('Kode_bahan')->sortable()->searchable(),
            TextColumn::make('Nama_bahan')->sortable()->searchable(),
            TextColumn::make('Total_bahan')->sortable()->searchable(),
            TextColumn::make('Tanggal_bahan')->sortable()->searchable()->dateTime(),
            
            ])
        
        
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBahanBakus::route('/'),
            'create' => Pages\CreateBahanBaku::route('/create'),
            'edit' => Pages\EditBahanBaku::route('/{record}/edit'),
        ];
    }    
    public static function getWidgets (): array 
    {
        return [
            StatsOverview::class,
        ];
    }
}
