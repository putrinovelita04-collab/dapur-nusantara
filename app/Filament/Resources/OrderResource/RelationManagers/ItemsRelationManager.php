<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use App\Models\Menu;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $title = 'Item Pesanan';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\Select::make('menu_id')
                ->label('Menu')
                ->options(Menu::pluck('name', 'id'))
                ->searchable()
                ->required()
                ->live()
                ->afterStateUpdated(function ($state, callable $set) {
                    $price = Menu::find($state)?->price ?? 0;
                    $set('price', $price);
                }),
            Forms\Components\TextInput::make('quantity')
                ->numeric()
                ->required()
                ->live()
                ->afterStateUpdated(fn ($state, callable $get, callable $set) =>
                    $set('subtotal', $state * $get('price'))),
            Forms\Components\TextInput::make('price')
                ->label('Harga Satuan')
                ->numeric()
                ->prefix('Rp')
                ->required(),
            Forms\Components\TextInput::make('subtotal')
                ->numeric()
                ->prefix('Rp')
                ->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('menu.name')
            ->columns([
                Tables\Columns\TextColumn::make('menu.name')->label('Menu'),
                Tables\Columns\TextColumn::make('quantity')->label('Qty'),
                Tables\Columns\TextColumn::make('price')->label('Harga')->money('IDR'),
                Tables\Columns\TextColumn::make('subtotal')->label('Subtotal')->money('IDR'),
            ])
            ->headerActions([
                \Filament\Actions\CreateAction::make(),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ]);
    }
}