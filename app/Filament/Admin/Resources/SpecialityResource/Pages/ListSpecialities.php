<?php

namespace App\Filament\Admin\Resources\SpecialityResource\Pages;

use App\Filament\Admin\Resources\SpecialityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpecialities extends ListRecords
{
    protected static string $resource = SpecialityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
