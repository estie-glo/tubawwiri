<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriberResource\Pages;
use App\Models\Subscriber;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SubscriberResource extends Resource
{
    protected static ?string $model = Subscriber::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Formulaires reçus';

    protected static ?string $navigationLabel = 'Newsletter';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('email')->disabled(),
            Forms\Components\TextInput::make('locale')->label('Langue')->disabled(),
            Forms\Components\Toggle::make('is_active')->label('Actif'),
            Forms\Components\DateTimePicker::make('subscribed_at')->label('Inscrit le')->disabled(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('locale')->label('Langue'),
                Tables\Columns\IconColumn::make('is_active')->boolean()->label('Actif'),
                Tables\Columns\TextColumn::make('subscribed_at')->label('Inscrit le')->dateTime('d/m/Y H:i'),
            ])
            ->defaultSort('subscribed_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->authorize(fn ($record) => auth()->user()?->can('delete', $record) ?? false),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubscribers::route('/'),
            'edit' => Pages\EditSubscriber::route('/{record}/edit'),
        ];
    }
}
