<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Actualités';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('category_id')->label('Catégorie')
                ->options(Category::pluck('name_fr', 'id'))->searchable(),
            Forms\Components\TextInput::make('title_fr')->label('Titre (FR)')->required()->live(onBlur: true)
                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
            Forms\Components\TextInput::make('title_en')->label('Titre (EN)'),
            Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),

            Forms\Components\Fieldset::make('Contenu')->schema([
                Forms\Components\Textarea::make('excerpt_fr')->label('Résumé (FR)')->rows(2),
                Forms\Components\Textarea::make('excerpt_en')->label('Résumé (EN)')->rows(2),
                Forms\Components\RichEditor::make('content_fr')->label('Contenu (FR)'),
                Forms\Components\RichEditor::make('content_en')->label('Contenu (EN)'),
            ])->columns(1),

            Forms\Components\Fieldset::make('Publication')->schema([
                Forms\Components\FileUpload::make('cover_image')->label('Image de couverture')->image()->directory('articles'),
                Forms\Components\TextInput::make('author')->label('Auteur'),
                Forms\Components\DateTimePicker::make('published_at')->label('Date de publication'),
                Forms\Components\Toggle::make('is_published')->label('Publié')->default(false),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image')->label(''),
                Tables\Columns\TextColumn::make('title_fr')->label('Titre')->searchable(),
                Tables\Columns\TextColumn::make('category.name_fr')->label('Catégorie'),
                Tables\Columns\TextColumn::make('published_at')->label('Publié le')->date('d/m/Y'),
                Tables\Columns\IconColumn::make('is_published')->boolean()->label('Publié'),
            ])
            ->defaultSort('published_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
