<?php

namespace App\Filament\Resources\Articles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ArticlesTable
{
    // Configura la tabella degli articoli
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // Mostra l'immagine caricata
                ImageColumn::make('image')
                    ->label('Immagine')
                    // Utilizza il disco "public"
                    ->disk('public')
                    // Visualizza l'immagine in formato quadrato
                    ->square(),

                // Titolo dell'articolo
                TextColumn::make('name')
                    ->label('Name')
                    // Permette la ricerca tramite il titolo
                    ->searchable()
                    // Permette l'ordinamento crescente o decrescente
                    ->sortable(),

                // Nome della categoria collegata
                TextColumn::make('category.name')
                    ->label('Categoria')
                    // Visualizza il testo come badge colorato
                    ->badge()
                    ->searchable()
                    ->sortable(),

                // Tags
                TextColumn::make('tags.name')
                    ->label('Tag')
                    ->badge()
                    ->separator(', ')
                    ->searchable(),
                // Icona per indicare se è pubblicato
                IconColumn::make('is_published')
                    ->label('Pubblicato')
                    // Visualizza automaticamente un'icona ✓ o ✕
                    ->boolean(),

                // Data di pubblicazione
                TextColumn::make('published_at')
                    ->label('Pubblicato il')
                    // Formatta data e ora
                    ->dateTime('d/m/Y H:i')
                    // Testo mostrato se la data è assente
                    ->placeholder('Non pubblicato')
                    ->sortable(),

                // Data di creazione
                TextColumn::make('created_at')
                    ->label('Creato il')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    // Nasconde la colonna di default,ma l'utente può mostrarla dal menu delle colonne
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Permette di filtrare gli articoli per categoria
                SelectFilter::make('category')
                    ->label('Categoria')
                    ->relationship('category', 'name'),

                // Permette di filtrare gli articoli per tag
                SelectFilter::make('tags')
                    ->label('Tag')
                    ->relationship('tags', 'name')
                    ->multiple()
                    ->preload(),
            ])
            // Definisce le azioni disponibili per ogni riga
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            // Definisce le azioni disponibili quando vengono selezionati più record
            ->toolbarActions([
                // Raggruppa le azioni di massa
                BulkActionGroup::make([
                    // Elimina tutti gli articoli selezionati
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
