<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActionDomainResource\Pages;
use App\Models\ActionDomain;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ActionDomainResource extends Resource
{
    protected static ?string $model = ActionDomain::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationGroup = 'Contenu du site';

    protected static ?string $navigationLabel = "Domaines d'action";

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title_fr')->label('Titre (FR)')->required()->live(onBlur: true)
                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
            Forms\Components\TextInput::make('title_en')->label('Titre (EN)'),
            Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
            Forms\Components\TextInput::make('icon')->label('Icône (classe ou chemin)'),
            Forms\Components\Textarea::make('summary_fr')->label('Résumé (FR)')->rows(2),
            Forms\Components\Textarea::make('summary_en')->label('Résumé (EN)')->rows(2),
            Forms\Components\RichEditor::make('enjeux_fr')->label('Enjeux'),
            Forms\Components\RichEditor::make('objectifs_fr')->label('Objectifs'),
            Forms\Components\RichEditor::make('actions_fr')->label('Actions'),
            Forms\Components\RichEditor::make('publics_cibles_fr')->label('Publics cibles'),
            Forms\Components\RichEditor::make('resultats_attendus_fr')->label('Résultats attendus'),
            Forms\Components\FileUpload::make('cover_image')->label('Image de couverture')->image()->directory('action-domains'),
            Forms\Components\TextInput::make('order')->numeric()->default(0)->label('Ordre affichage'),
            Forms\Components\Toggle::make('is_published')->label('Publié')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image')->label(''),
                Tables\Columns\TextColumn::make('title_fr')->label('Titre')->searchable(),
                Tables\Columns\TextColumn::make('order')->label('Ordre')->sortable(),
                Tables\Columns\IconColumn::make('is_published')->boolean()->label('Publié'),
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
            'index' => Pages\ListActionDomains::route('/'),
            'create' => Pages\CreateActionDomain::route('/create'),
            'edit' => Pages\EditActionDomain::route('/{record}/edit'),
        ];
    }
}
