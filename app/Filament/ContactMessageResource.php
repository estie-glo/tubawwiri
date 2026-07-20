<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Models\ContactMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Formulaires reçus';

    protected static ?string $navigationLabel = 'Messages de contact';

    public static function canCreate(): bool
    {
        return false; // soumis uniquement via le site public
    }

    public static function canDelete($record): bool
{
    return auth()->user()?->role === 'admin';
}


    
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nom')->disabled(),
            Forms\Components\TextInput::make('email')->disabled(),
            Forms\Components\TextInput::make('telephone')->disabled(),
            Forms\Components\TextInput::make('pays')->disabled(),
            Forms\Components\TextInput::make('sujet')->disabled(),
            Forms\Components\Textarea::make('message')->disabled()->rows(5),
            Forms\Components\Toggle::make('is_read')->label('Traité / lu'),
        ]);
    }

   public static function table(Table $table): Table
    {
return $table
            ->columns([
Tables\Columns\TextColumn::make('nom'),
Tables\Columns\TextColumn::make('email'),
Tables\Columns\TextColumn::make('sujet'),
Tables\Columns\TextColumn::make('created_at')->label('Reçu le')->dateTime('d/m/Y H:i'),
Tables\Columns\IconColumn::make('is_read')->boolean()->label('Traité'),
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
            'index' => Pages\ListContactMessages::route('/'),
            'create' => Pages\CreateContactMessage::route('/create'),
            'edit' => Pages\EditContactMessage::route('/{record}/edit'),
        ];
    }
}
