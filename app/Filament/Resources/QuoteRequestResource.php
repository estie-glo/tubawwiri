<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuoteRequestResource\Pages;
use App\Models\QuoteRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class QuoteRequestResource extends Resource
{
    protected static ?string $model = QuoteRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = 'Formulaires reçus';

    protected static ?string $navigationLabel = 'Demandes de devis (Consulting)';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Fieldset::make('Contact')->schema([
                Forms\Components\TextInput::make('nom')->disabled(),
                Forms\Components\TextInput::make('organisation')->disabled(),
                Forms\Components\TextInput::make('email')->disabled(),
                Forms\Components\TextInput::make('telephone')->disabled(),
                Forms\Components\TextInput::make('pays')->disabled(),
            ]),

            Forms\Components\Fieldset::make('Détails de la demande')->schema([
                Forms\Components\TextInput::make('service_souhaite')->label('Service souhaité')->disabled(),
                Forms\Components\TextInput::make('budget_estimatif')->label('Budget estimatif')->disabled(),
                Forms\Components\TextInput::make('delai')->disabled(),
                Forms\Components\Textarea::make('description_besoin')->label('Besoin')->disabled()->rows(4),
            ])->columns(1),

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
                Tables\Columns\TextColumn::make('organisation'),
                Tables\Columns\TextColumn::make('service_souhaite')->label('Service'),
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
            'index' => Pages\ListQuoteRequests::route('/'),
            'create' => Pages\CreateQuoteRequest::route('/create'),
            'edit' => Pages\EditQuoteRequest::route('/{record}/edit'),
        ];
    }
}
