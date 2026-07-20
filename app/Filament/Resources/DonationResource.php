<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DonationResource\Pages;
use App\Models\Donation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DonationResource extends Resource
{
    protected static ?string $model = Donation::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';

    protected static ?string $navigationGroup = 'Formulaires reçus';

    protected static ?string $navigationLabel = 'Dons';

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
            Forms\Components\TextInput::make('montant')->label('Montant (FCFA)')->disabled(),
            Forms\Components\TextInput::make('moyen_paiement')->label('Moyen de paiement')->disabled(),
            Forms\Components\TextInput::make('type_don')->label('Type de don')->disabled(),
            Forms\Components\TextInput::make('provider_reference')->label('Référence transaction')->disabled(),
            Forms\Components\Select::make('status')->label('Statut')->options([
                'en_attente' => 'En attente',
                'confirme' => 'Confirmé',
                'echoue' => 'Échoué',
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom')->default('Anonyme'),
                Tables\Columns\TextColumn::make('montant')->label('Montant')->money('XAF'),
                Tables\Columns\TextColumn::make('moyen_paiement')->label('Moyen')->badge(),
                Tables\Columns\TextColumn::make('type_don')->label('Type')->badge(),
                Tables\Columns\TextColumn::make('status')->badge(),
                Tables\Columns\TextColumn::make('created_at')->label('Date')->dateTime('d/m/Y H:i'),
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
            'index' => Pages\ListDonations::route('/'),
            'create' => Pages\CreateDonation::route('/create'),
            'edit' => Pages\EditDonation::route('/{record}/edit'),
        ];
    }
}
