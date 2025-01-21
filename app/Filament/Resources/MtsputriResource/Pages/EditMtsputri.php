<?php

namespace App\Filament\Resources\MtsputriResource\Pages;

use App\Filament\Resources\MtsputriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMtsputri extends EditRecord
{
    protected static string $resource = MtsputriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
