<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

// Questa classe configura la pagina di visualizzazione (View) di una categoria nel pannello Filament
class CategoryInfolist
{
    // Metodo statico che configura l'Infolist
    // Riceve uno Schema e restituisce lo Schema configurato
    public static function configure(Schema $schema): Schema
    {
        // Restituisce lo schema dell'Infolist
        return $schema
            // components() contiene tutti i campi che verranno mostrati nella pagina di visualizzazione della categoria
            ->components([
                // Mostra il valore della colonna "name"
                TextEntry::make('name'),
                // Mostra la data e l'ora di creazione del record
                TextEntry::make('created_at')
                    // Formatta automaticamente il valore come data e ora leggibile
                    ->dateTime()
                    // Se il valore è NULL, mostra un trattino invece di lasciare il campo vuoto
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
