<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Transaksi;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\TransaksiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TransaksiResource\RelationManagers;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static ?string $recordTitleAttribute = 'Nama_kasir';

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationGroup = 'Manajemen';

    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Card::make()
                        ->schema([
                            TextInput::make('Invoice')->required()->unique(ignorable:fn($record)=>$record),
                            TextInput::make('Nama_kasir')->required(),
                            TextInput::make('Total_harga')->required(),
                            DateTimePicker::make('Tanggal_transaksi')->required(),
                            
                            ])
                    
                        ]);
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Invoice')->sortable()->searchable(),
                TextColumn::make('Nama_kasir')->sortable()->searchable(),
                TextColumn::make('Total_harga')->sortable()->searchable(),
                TextColumn::make('Tanggal_transaksi')->sortable()->searchable()->dateTime(),
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
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }    
}
