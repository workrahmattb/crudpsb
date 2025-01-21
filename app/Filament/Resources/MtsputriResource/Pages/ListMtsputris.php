<?php

namespace App\Filament\Resources\MtsputriResource\Pages;

use App\Filament\Resources\MtsputriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMtsputris extends ListRecords
{
    protected static string $resource = MtsputriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
