<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CategoryForm
{
    // Metodo statico che configura il form
    // Riceve come parametro un oggetto Schema e restituisce lo Schema configurato
    public static function configure(Schema $schema): Schema
    {
        // Restituisce lo schema del form
        return $schema
            // components() contiene tutti i campi che verranno mostrati nel form
            ->components([
                // Crea un campo di testo collegato alla colonna "name" della tabella categories
                TextInput::make('name')
                    // Rende il campo obbligatorio
                    ->required(),
            ]);
    }
}
