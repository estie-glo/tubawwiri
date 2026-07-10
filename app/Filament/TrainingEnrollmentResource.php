<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrainingEnrollmentResource\Pages;
use App\Models\TrainingEnrollment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TrainingEnrollmentResource extends Resource
{
    protected static ?string $model = TrainingEnrollment::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $navigationGroup = 'TBW Academy';

    protected static ?string $navigationLabel = 'Inscriptions';

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
            Forms\Components\TextInput::make('niveau')->disabled(),
            Forms\Components\TextInput::make('mode')->disabled(),
            Forms\Components\Select::make('status')->label('Statut')->options([
                'nouveau' => 'Nouveau',
                'confirme' => 'Confirmé',
                'annule' => 'Annulé',
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom'),
                Tables\Columns\TextColumn::make('training.title_fr')->label('Formation'),
                Tables\Columns\TextColumn::make('mode')->badge(),
                Tables\Columns\TextColumn::make('status')->badge(),
                Tables\Columns\TextColumn::make('created_at')->label('Inscrit le')->dateTime('d/m/Y H:i'),
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
            'index' => Pages\ListTrainingEnrollments::route('/'),
            'create' => Pages\CreateTrainingEnrollment::route('/create'),
            'edit' => Pages\EditTrainingEnrollment::route('/{record}/edit'),
        ];
    }
}
