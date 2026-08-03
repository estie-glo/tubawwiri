<?php

namespace App\Filament\Resources\ResourceItemResource\Pages;

use App\Filament\Resources\ResourceItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResourceItem extends EditRecord
{
    protected static string $resource = ResourceItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
