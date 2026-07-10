<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrainingResource\Pages;
use App\Models\Training;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TrainingResource extends Resource
{
    protected static ?string $model = Training::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'TBW Academy';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title_fr')->label('Titre')->required()->live(onBlur: true)
                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
            Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
            Forms\Components\Textarea::make('description_fr')->label('Description')->rows(4),
            Forms\Components\Select::make('level')->label('Niveau')->options([
                'debutant' => 'Débutant',
                'intermediaire' => 'Intermédiaire',
                'avance' => 'Avancé',
            ]),
            Forms\Components\Select::make('mode')->options([
                'presentiel' => 'Présentiel',
                'en_ligne' => 'En ligne',
            ])->required(),
            Forms\Components\TextInput::make('duree')->label('Durée'),
            Forms\Components\TextInput::make('price')->label('Prix (FCFA)')->numeric(),
            Forms\Components\FileUpload::make('cover_image')->image()->directory('trainings'),
            Forms\Components\Toggle::make('is_published')->label('Publié')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_fr')->label('Titre')->searchable(),
                Tables\Columns\TextColumn::make('mode')->label('Mode')->badge(),
                Tables\Columns\TextColumn::make('price')->label('Prix')->money('XAF'),
                Tables\Columns\TextColumn::make('enrollments_count')->counts('enrollments')->label('Inscrits'),
                Tables\Columns\IconColumn::make('is_published')->boolean()->label('Publié'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrainings::route('/'),
            'create' => Pages\CreateTraining::route('/create'),
            'edit' => Pages\EditTraining::route('/{record}/edit'),
        ];
    }
}
