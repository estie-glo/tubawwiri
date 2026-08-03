<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Models\ActionDomain;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'Contenu du site';

    protected static ?string $navigationLabel = 'Programmes';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('action_domain_id')
                ->label("Domaine d'action")
                ->options(ActionDomain::pluck('title_fr', 'id'))
                ->searchable(),
            Forms\Components\TextInput::make('title_fr')->label('Titre (FR)')->required()->live(onBlur: true)
                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
            Forms\Components\TextInput::make('title_en')->label('Titre (EN)'),
            Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
            Forms\Components\Textarea::make('summary_fr')->label('Résumé')->rows(2),

            Forms\Components\Fieldset::make('Structure du programme')->schema([
                Forms\Components\Textarea::make('probleme_fr')->label('Problème identifié')->rows(3)
                    ->helperText("Quel problème concret ce programme cherche-t-il à résoudre ?"),
                Forms\Components\Textarea::make('public_concerne_fr')->label('Public concerné')->rows(2),
                Forms\Components\RichEditor::make('objectifs_fr')->label('Objectifs'),
                Forms\Components\RichEditor::make('activites_fr')->label('Activités'),
                Forms\Components\Textarea::make('resultats_attendus_fr')->label('Résultats attendus')->rows(3),
                Forms\Components\Textarea::make('indicateurs_fr')->label('Indicateurs')->rows(2),
                Forms\Components\CheckboxList::make('defis_3t')->label('Défis des 3T associés')
                    ->options([
                        'tesimama' => 'TESIMAMA — Se reconnecter',
                        'tolamuke' => 'TOLAMUKE — Prendre conscience et apprendre',
                        'telumiere' => 'TELUMIÈRE — Agir et faire rayonner',
                    ]),
            ])->columns(1),

            Forms\Components\TextInput::make('duree')->label('Durée'),
            Forms\Components\Textarea::make('beneficiaires_fr')->label('Bénéficiaires')->rows(2),
            Forms\Components\Textarea::make('partenaires_souhaites_fr')->label('Partenaires souhaités')->rows(2),
            Forms\Components\FileUpload::make('cover_image')->image()->directory('programs'),
            Forms\Components\Toggle::make('is_published')->label('Publié')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_fr')->label('Titre')->searchable(),
                Tables\Columns\TextColumn::make('actionDomain.title_fr')->label('Domaine'),
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
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}
