<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Supplier;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SupplierResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\SupplierResource\RelationManagers;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    protected static ?string $recordTitleAttribute = 'Nama_supplier';

    protected static ?string $navigationGroup = 'Manajemen';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()
                ->schema([
                  //  TextInput::make('Kode_supplier')->required()->unique(ignorable: fn($record) => $record),
                    TextInput::make('Nama_supplier')->required(),
                    TextInput::make('Nomor_telepon')->required(),
                    TextInput::make('Nama_produk_supplier')->required(),
                 //  SpatieMediaLibraryFileUpload::make('Informasi_produk')->required(),
                ])
        ]);
    
                    
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
             //   TextColumn::make('Kode_supplier')->sortable()->searchable(),
                TextColumn::make('Nama_supplier')->sortable()->searchable(),
                TextColumn::make('Nomor_telepon')->sortable()->searchable(),
                TextColumn::make('Nama_produk_supplier')->sortable()->searchable(),
               // ImageColumn::make('Informasi_produk'),
            //    SpatieMediaLibraryImageColumn::make('Informasi_produk'),
               
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
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }    
}
