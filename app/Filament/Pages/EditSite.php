<?php

namespace App\Filament\Pages;

use App\Models\Site;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Pages\Actions\ButtonAction;
use Livewire\TemporaryUploadedFile;

class EditSite extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-adjustments';

    protected static string $view = 'filament.pages.edit-site';
    protected static ?string $navigationGroup = 'Setting';
    protected static ?int $navigationSort = 52;

    public $name;
    public $favicon;
    public $color;

    public function mount()
    {
        $site = Site::first();

        $this->name = $site->name;
        $this->color = $site->color;
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')->label('Name Site'),
            // SpatieMediaLibraryFileUpload::make('favicon')->image(),
            Forms\Components\ColorPicker::make('color')->label('Main Color')
                ->hsl()
                ->regex('/^hsl\(\s*(\d+)\s*,\s*(\d*(?:\.\d+)?%)\s*,\s*(\d*(?:\.\d+)?%)\)$/')
            
        ];
    }

    public function save()
    {
        $site = Site::first();

        // dd($this->favicon);
        $fileKey = array_key_first($this->favicon);

        // Validasi dan update profil user
        $site->update([
            'name' => $this->name,
            // 'favicon' => $this->favicon[$fileKey]->getClientOriginalName(),
            'color' => $this->color,
        ]);

        // Berikan notifikasi
        $this->notify('success', 'Profile updated successfully!');
    }

    protected function getActions(): array
    {
        return [
            ButtonAction::make('save')
                ->label('Save Changes')
                ->action('save'),
        ];
    }

}
