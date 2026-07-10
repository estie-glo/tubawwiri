<?php

namespace App\Filament\Resources\ActionDomainResource\Pages;

use App\Filament\Resources\ActionDomainResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditActionDomain extends EditRecord
{
    protected static string $resource = ActionDomainResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
