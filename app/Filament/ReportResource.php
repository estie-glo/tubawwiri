<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportResource\Pages;
use App\Models\Report;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationGroup = 'Observatoire & Ressources';

    protected static ?string $navigationLabel = 'Rapports / Analyses';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title_fr')->label('Titre')->required()->live(onBlur: true)
                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
            Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
            Forms\Components\Select::make('type')->options([
                'analyse' => 'Analyse',
                'note' => 'Note',
                'rapport' => 'Rapport',
                'barometre' => 'Baromètre',
            ])->required(),
            Forms\Components\Textarea::make('summary_fr')->label('Résumé')->rows(3),
            Forms\Components\FileUpload::make('file_path')->label('Document PDF')->directory('reports')->acceptedFileTypes(['application/pdf']),
            Forms\Components\FileUpload::make('cover_image')->image()->directory('reports-covers'),
            Forms\Components\DatePicker::make('published_on')->label('Date de publication'),
            Forms\Components\Toggle::make('is_published')->label('Publié')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_fr')->label('Titre')->searchable(),
                Tables\Columns\TextColumn::make('type')->label('Type')->badge(),
                Tables\Columns\TextColumn::make('published_on')->label('Date')->date('d/m/Y'),
                Tables\Columns\IconColumn::make('is_published')->boolean()->label('Publié'),
            ])
            ->defaultSort('published_on', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }
}
