<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers\ItemsRelationManager;
use App\Models\Order;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = 'Pesanan';

    protected static string | \UnitEnum | null $navigationGroup = 'Transaksi';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Data Pemesan')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('order_number')
                        ->label('No. Pesanan')
                        ->disabled()
                        ->dehydrated(false),
                    Forms\Components\Select::make('status')
                        ->options([
                            'pending' => 'Pending',
                            'confirmed' => 'Dikonfirmasi',
                            'processing' => 'Diproses',
                            'completed' => 'Selesai',
                            'cancelled' => 'Dibatalkan',
                        ])
                        ->required(),
                    Forms\Components\TextInput::make('customer_name')->label('Nama Pelanggan')->required(),
                    Forms\Components\TextInput::make('phone')->label('No. HP')->tel()->required(),
                    Forms\Components\TextInput::make('email')->label('Email')->email(),
                    Forms\Components\DatePicker::make('event_date')->label('Tanggal Acara')->required(),
                    Forms\Components\Textarea::make('event_address')
                        ->label('Alamat Acara')
                        ->columnSpanFull()
                        ->required(),
                    Forms\Components\Textarea::make('notes')
                        ->label('Catatan')
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('total_price')
                        ->label('Total Harga')
                        ->numeric()
                        ->prefix('Rp'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_number')->label('No. Pesanan')->searchable(),
                Tables\Columns\TextColumn::make('customer_name')->label('Pelanggan')->searchable(),
                Tables\Columns\TextColumn::make('event_date')->label('Tgl Acara')->date()->sortable(),
                Tables\Columns\TextColumn::make('total_price')->label('Total')->money('IDR')->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'warning' => 'pending',
                        'info' => 'confirmed',
                        'primary' => 'processing',
                        'success' => 'completed',
                        'danger' => 'cancelled',
                    ]),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat')->dateTime()->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Dikonfirmasi',
                        'processing' => 'Diproses',
                        'completed' => 'Selesai',
                        'cancelled' => 'Dibatalkan',
                    ]),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            ItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}