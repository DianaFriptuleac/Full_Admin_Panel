<?php

namespace App\Filament\Resources\Tags\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class TagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255)
                    // Aggiorna il valore quando esco dal campo
                    ->live(onBlur: true)
                    // Genera automaticamente lo slug dal nome del tag
                    ->afterStateUpdated(
                        fn(?string $state, Set $set) =>
                        $set('slug', Str::slug($state ?? ''))
                    ),
                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255)
                    //slug univoco nel database
                    ->unique(ignoreRecord: true),
            ]);
    }
}
