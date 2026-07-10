<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImpactStatResource\Pages;
use App\Models\ImpactStat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ImpactStatResource extends Resource
{
    protected static ?string $model = ImpactStat::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    protected static ?string $navigationGroup = 'Contenu du site';

    protected static ?string $navigationLabel = "Chiffres d'impact";

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('label_fr')->label('Libellé (FR)')->required()
                ->helperText('ex: Personnes accompagnées'),
            Forms\Components\TextInput::make('label_en')->label('Libellé (EN)'),
            Forms\Components\TextInput::make('value')->label('Valeur')->numeric()->required(),
            Forms\Components\TextInput::make('icon')->label('Icône'),
            Forms\Components\TextInput::make('order')->label('Ordre')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label_fr')->label('Libellé'),
                Tables\Columns\TextColumn::make('value')->label('Valeur')->numeric(),
                Tables\Columns\TextColumn::make('order')->label('Ordre'),
            ])
            ->defaultSort('order')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListImpactStats::route('/'),
            'create' => Pages\CreateImpactStat::route('/create'),
            'edit' => Pages\EditImpactStat::route('/{record}/edit'),
        ];
    }
}
