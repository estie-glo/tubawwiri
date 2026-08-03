<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResourceItemResource\Pages;
use App\Models\Resource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource as FilamentResource;
use Filament\Tables;
use Filament\Tables\Table;

class ResourceItemResource extends FilamentResource
{
    protected static ?string $model = Resource::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    protected static ?string $navigationGroup = 'Observatoire & Ressources';

    protected static ?string $navigationLabel = 'Centre de ressources';

    protected static ?string $modelLabel = 'Ressource';

    protected static ?string $pluralModelLabel = 'Ressources';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title_fr')->label('Titre FR')->required()->live(onBlur: true)
                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
            Forms\Components\TextInput::make('title_en')->label('Titre EN'),
            Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
            Forms\Components\Select::make('category')->label('Catégorie')->options([
                'guide' => 'Guide',
                'rapport' => 'Rapport',
                'outil' => 'Outil pratique',
                'podcast' => 'Podcast',
                'video' => 'Vidéo',
                'infographie' => 'Infographie',
                'document' => 'Document',
            ])->required(),
            Forms\Components\Textarea::make('description_fr')->label('Description FR')->rows(4),
            Forms\Components\Textarea::make('description_en')->label('Description EN')->rows(4),
            Forms\Components\FileUpload::make('file_path')->label('Fichier')->directory('resources'),
            Forms\Components\TextInput::make('external_url')->label('Lien externe')->url(),
            Forms\Components\FileUpload::make('cover_image')->image()->directory('resources-covers'),
            Forms\Components\Toggle::make('is_published')->label('Publié')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_fr')->label('Titre')->searchable(),
                Tables\Columns\TextColumn::make('category')->label('Catégorie')->badge(),
                Tables\Columns\IconColumn::make('is_published')->boolean()->label('Publié'),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d/m/Y')->label('Créé'),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResourceItems::route('/'),
            'create' => Pages\CreateResourceItem::route('/create'),
            'edit' => Pages\EditResourceItem::route('/{record}/edit'),
        ];
    }
}
