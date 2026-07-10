<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Contenu du site';

    protected static ?string $navigationLabel = 'Pages institutionnelles';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title_fr')->label('Titre (FR)')->required(),
            Forms\Components\TextInput::make('title_en')->label('Titre (EN)'),
            Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true)
                ->helperText('ex: qui-sommes-nous, notre-approche'),
            Forms\Components\RichEditor::make('content_fr')->label('Contenu (FR)'),
            Forms\Components\RichEditor::make('content_en')->label('Contenu (EN)'),
            Forms\Components\FileUpload::make('cover_image')->image()->directory('pages'),
            Forms\Components\Fieldset::make('SEO')->schema([
                Forms\Components\TextInput::make('meta_title_fr')->label('Meta titre (FR)'),
                Forms\Components\TextInput::make('meta_title_en')->label('Meta titre (EN)'),
                Forms\Components\Textarea::make('meta_description_fr')->label('Meta description (FR)')->rows(2),
                Forms\Components\Textarea::make('meta_description_en')->label('Meta description (EN)')->rows(2),
            ]),
            Forms\Components\Toggle::make('is_published')->label('Publié')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_fr')->label('Titre')->searchable(),
                Tables\Columns\TextColumn::make('slug')->label('Slug'),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
