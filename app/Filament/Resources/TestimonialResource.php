<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationLabel = 'Testimoni';

    protected static string | \UnitEnum | null $navigationGroup = 'Konten';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\TextInput::make('customer_name')
                ->label('Nama Pelanggan')
                ->required(),
            Forms\Components\TextInput::make('occasion')
                ->label('Jabatan / Acara')
                ->placeholder('Contoh: Corporate Secretary, PT Telkom / Acara Pernikahan'),
            Forms\Components\FileUpload::make('photo')
                ->label('Foto')
                ->image()
                ->disk('public')
                ->directory('testimonials'),
            Forms\Components\Select::make('rating')
                ->options(['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'])
                ->default(5)
                ->required(),
            Forms\Components\Textarea::make('message')
                ->label('Isi Testimoni')
                ->required()
                ->rows(4)
                ->columnSpanFull(),
            Forms\Components\Toggle::make('is_published')
                ->label('Tampilkan di Website')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')->label('Foto')->circular(),
                Tables\Columns\TextColumn::make('customer_name')->label('Nama')->searchable(),
                Tables\Columns\TextColumn::make('rating')->label('Rating')->sortable(),
                Tables\Columns\TextColumn::make('message')->label('Pesan')->limit(50),
                Tables\Columns\IconColumn::make('is_published')->label('Publish')->boolean(),
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}