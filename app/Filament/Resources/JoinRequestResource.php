<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JoinRequestResource\Pages;
use App\Models\JoinRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class JoinRequestResource extends Resource
{
    protected static ?string $model = JoinRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    protected static ?string $navigationGroup = 'Formulaires reçus';

    protected static ?string $navigationLabel = 'Nous rejoindre';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nom')->disabled(),
            Forms\Components\TextInput::make('email')->disabled(),
            Forms\Components\TextInput::make('telephone')->disabled(),
            Forms\Components\TextInput::make('pays')->disabled(),
            Forms\Components\TextInput::make('profil')->disabled(),
            Forms\Components\Textarea::make('motivation')->disabled()->rows(4),
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
                Tables\Columns\TextColumn::make('nom'),
                Tables\Columns\TextColumn::make('profil')->badge(),
                Tables\Columns\TextColumn::make('pays'),
                Tables\Columns\TextColumn::make('status')->badge(),
                Tables\Columns\TextColumn::make('created_at')->label('Reçu le')->dateTime('d/m/Y H:i'),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJoinRequests::route('/'),
            'create' => Pages\CreateJoinRequest::route('/create'),
            'edit' => Pages\EditJoinRequest::route('/{record}/edit'),
        ];
    }
}
