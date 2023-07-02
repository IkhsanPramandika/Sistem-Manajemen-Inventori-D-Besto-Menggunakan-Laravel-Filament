<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Pengaturan'; // NAVIGASI GRUP

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Card::make()->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(50),

                TextInput::make('email')
                    ->label('Email Address')
                    ->required()
                    ->maxLength(50),

                TextInput::make('password')
                    ->password()
                    ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord)
                    ->minLength(8)
                    ->same('passwordConfirmation')
                    ->dehydrated(fn ($state) => filled($state))
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state)),

                TextInput::make('passwordConfirmation')
                    ->password()
                    ->label('Konfirmasi Password')
                    ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord)
                    ->minLength(8)
                    ->dehydrated(false),

                    Select::make('Roles')
                    ->multiple()
                    ->relationship('Roles','name')->preload(),
                    
                 //   Select::make('Permissions')
                 //   ->multiple()                                      //BUAT PERMISSIONS ATAU IJIN AKSES
                 //   ->relationship('Permissions','name')->preload(),
                    
            ])
        ]);
}
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('No')->getStateUsing(
                    static function($rowLoop, HasTable $livewire): string{
                        return(string)(
                            $rowLoop->iteration +
                            ($livewire->tableRecordsPerPage * ($livewire->page -1))

                        );
                    }
                ),
                TextColumn::make('name')->limit('50')->sortable()->searchable(),
                TextColumn::make('email')->limit('50')->searchable(),
                TextColumn::make('Roles.name')->limit('50')->searchable(),
                
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
