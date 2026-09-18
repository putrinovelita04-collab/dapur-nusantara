<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Pengaturan Website';

    protected static ?string $title = 'Pengaturan Website';

    protected string $view = 'filament.pages.settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'alamat' => Setting::get('alamat'),
            'no_wa' => Setting::get('no_wa'),
            'jam_operasional' => Setting::get('jam_operasional'),
            'link_instagram' => Setting::get('link_instagram'),
            'link_facebook' => Setting::get('link_facebook'),
            'email' => Setting::get('email'),
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Umum')
                    ->schema([
                        Forms\Components\Textarea::make('alamat')
                            ->label('Alamat')
                            ->rows(3),
                        Forms\Components\TextInput::make('no_wa')
                            ->label('Nomor WhatsApp')
                            ->helperText('Format: 62812xxxxxxx (tanpa tanda +)'),
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email(),
                        Forms\Components\TextInput::make('jam_operasional')
                            ->label('Jam Operasional')
                            ->placeholder('Senin - Sabtu, 08.00 - 20.00'),
                        Forms\Components\TextInput::make('link_instagram')
                            ->label('Link Instagram'),
                        Forms\Components\TextInput::make('link_facebook')
                            ->label('Link Facebook'),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            Setting::set($key, $value);
        }

        Notification::make()
            ->title('Pengaturan berhasil disimpan')
            ->success()
            ->send();
    }
}