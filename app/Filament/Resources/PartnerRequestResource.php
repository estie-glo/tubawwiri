<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerRequestResource\Pages;
use App\Models\PartnerRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PartnerRequestResource extends Resource
{
    protected static ?string $model = PartnerRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-hand-raised';

    protected static ?string $navigationGroup = 'Formulaires reçus';

    protected static ?string $navigationLabel = 'Demandes de partenariat';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('organisation')->disabled(),
            Forms\Components\TextInput::make('nom_responsable')->disabled(),
            Forms\Components\TextInput::make('email')->disabled(),
            Forms\Components\TextInput::make('telephone')->disabled(),
            Forms\Components\TextInput::make('pays')->disabled(),
            Forms\Components\TextInput::make('type_partenariat')->disabled(),
            Forms\Components\Textarea::make('message')->disabled()->rows(4),
            Forms\Components\Select::make('status')->label('Statut')->options([
                'nouveau' => 'Nouveau',
                'en_cours' => 'En cours',
                'traite' => 'Traité',
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('organisation'),
                Tables\Columns\TextColumn::make('nom_responsable')->label('Responsable'),
                Tables\Columns\TextColumn::make('type_partenariat')->label('Type'),
                Tables\Columns\TextColumn::make('status')->badge()->color(fn (string $state): string => match ($state) {
                    'nouveau' => 'info',
                    'en_cours' => 'warning',
                    'traite' => 'success',
                    default => 'gray',
                }),
                Tables\Columns\TextColumn::make('created_at')->label('Reçu le')->dateTime('d/m/Y H:i'),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
    ->visible(fn () => auth()->user()?->role === 'admin'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPartnerRequests::route('/'),
            'create' => Pages\CreatePartnerRequest::route('/create'),
            'edit' => Pages\EditPartnerRequest::route('/{record}/edit'),
        ];
    }
}
