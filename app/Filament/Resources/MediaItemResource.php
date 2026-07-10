<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaItemResource\Pages;
use App\Models\MediaItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MediaItemResource extends Resource
{
    protected static ?string $model = MediaItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Médias';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')->label('Titre'),
            Forms\Components\Select::make('type')->options([
                'photo' => 'Photo',
                'video' => 'Vidéo',
                'communique' => 'Communiqué',
                'presse' => 'Presse',
            ])->required()->live(),
            Forms\Components\FileUpload::make('file_path')->label('Fichier (image ou PDF)')
                ->directory('media')->visible(fn ($get) => in_array($get('type'), ['photo', 'communique', 'presse'])),
            Forms\Components\TextInput::make('video_url')->label('Lien vidéo (YouTube)')
                ->visible(fn ($get) => $get('type') === 'video'),
            Forms\Components\TextInput::make('order')->label('Ordre')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Titre'),
                Tables\Columns\TextColumn::make('type')->badge(),
                Tables\Columns\TextColumn::make('order')->label('Ordre'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMediaItems::route('/'),
            'create' => Pages\CreateMediaItem::route('/create'),
            'edit' => Pages\EditMediaItem::route('/{record}/edit'),
        ];
    }
}
