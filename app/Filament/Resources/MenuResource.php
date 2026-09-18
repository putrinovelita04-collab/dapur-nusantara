<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Models\Category;
use App\Models\Menu;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationLabel = 'Menu / Paket Catering';

    protected static string | \UnitEnum | null $navigationGroup = 'Katalog';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Informasi Menu')
                ->columns(2)
                ->schema([
                    Forms\Components\Select::make('category_id')
                        ->label('Kategori')
                        ->options(Category::pluck('name', 'id'))
                        ->searchable()
                        ->required(),
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Menu')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true),
                    Forms\Components\TextInput::make('price')
                        ->label('Harga (Rp)')
                        ->numeric()
                        ->prefix('Rp')
                        ->required(),
                    Forms\Components\TextInput::make('min_order')
                        ->label('Minimal Pemesanan (porsi)')
                        ->numeric()
                        ->default(1)
                        ->required(),
                    Forms\Components\Select::make('status')
                        ->options(['aktif' => 'Aktif', 'nonaktif' => 'Nonaktif'])
                        ->default('aktif')
                        ->required(),
                    Forms\Components\Toggle::make('is_featured')
                        ->label('Tampilkan di Menu Populer'),
                    Forms\Components\Textarea::make('description')
                        ->label('Deskripsi')
                        ->columnSpanFull()
                        ->rows(4),
                    Forms\Components\FileUpload::make('image')
                        ->label('Foto Menu')
                        ->image()
                        ->disk('public')
                        ->directory('menus')
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Foto'),
                Tables\Columns\TextColumn::make('name')->label('Nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('category.name')->label('Kategori')->sortable(),
                Tables\Columns\TextColumn::make('price')->label('Harga')->money('IDR')->sortable(),
                Tables\Columns\IconColumn::make('is_featured')->label('Populer')->boolean(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors(['success' => 'aktif', 'danger' => 'nonaktif']),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat')->date()->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name'),
                Tables\Filters\SelectFilter::make('status')
                    ->options(['aktif' => 'Aktif', 'nonaktif' => 'Nonaktif']),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}