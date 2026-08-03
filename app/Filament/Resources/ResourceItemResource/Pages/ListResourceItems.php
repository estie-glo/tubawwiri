<?php

namespace App\Filament\Resources\ResourceItemResource\Pages;

use App\Filament\Resources\ResourceItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResourceItems extends ListRecords
{
    protected static string $resource = ResourceItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
