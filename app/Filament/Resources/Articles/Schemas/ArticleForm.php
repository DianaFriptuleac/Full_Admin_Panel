<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;


class ArticleForm
{
    // form di creazione e modifica degli articoli
    public static function configure(Schema $schema): Schema
    {
        return $schema
            // Definisce tutti i campi del form
            ->components([

                // Seleziona una categoria già presente nel database
                Select::make('category_id')
                    ->label('Categoria')
                    // Recupera automaticamente le categorie dal database
                    // utilizzando la relazione "category" del model Article e visualizza il campo "name"
                    ->relationship('category', 'name')
                    // Permette di cercare una categoria digitando il nome
                    ->searchable()
                    // Carica subito tutte le categorie senza attendere la ricerca
                    ->preload()
                    ->required(),

                // Tag section
                Select::make('tags')
                    ->label('Tag')
                    // Usa la relazione tags() del model Article e mostra il campo name del model Tag
                    ->relationship('tags', 'name')
                    // Permette di selezionare più tag
                    ->multiple()
                    // Permette di cercare i tag
                    ->searchable()
                    // Carica subito i tag esistenti
                    ->preload(),

                // Campo di testo per inserire il titolo dell'articolo
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255)
                    // Aggiorna il valore quando il campo perde il focus
                    ->live(onBlur: true)
                    // Genera automaticamente lo slug partendo dal titolo
                    ->afterStateUpdated(
                        // Converte il titolo in uno slug
                        // Esempio: "Il Mio Articolo" -> "il-mio-articolo"
                        fn(?string $state, Set $set) =>
                        $set('slug', Str::slug($state ?? ''))
                    ),

                // Slug generato automaticamente dal titolo
                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255)
                    // Impedisce di avere slug duplicati ignorando il record corrente durante la modifica
                    ->unique(ignoreRecord: true),

                // Editor per scrivere il contenuto
                Textarea::make('content')
                    ->label('Contenuto')
                    ->required()
                    // Occupa tutta la larghezza del form
                    ->columnSpanFull(),

                // Upload dell'immagine dell'articolo
                FileUpload::make('image')
                    ->label('Immagine')
                    // Permette solamente immagini
                    ->image()
                    // Utilizza il disco "public"
                    ->disk('public')
                    // Salva le immagini nella cartella storage/app/public/articles
                    ->directory('articles')
                    // Rende il file pubblico
                    ->visibility('public')
                    // Altezza dell'anteprima dell'immagine
                    ->imagePreviewHeight('200')
                    // Permette di aprire l'immagine caricata
                    ->openable()
                    // Permette di scaricare l'immagine
                    ->downloadable(),

                // Interruttore per pubblicare o meno l'articolo
                Toggle::make('is_published')
                    ->label('Pubblicato')
                    // Valore predefinito: non pubblicato
                    ->default(false),

                // Data di pubblicazione
                DateTimePicker::make('published_at')
                    ->label('Data di pubblicazione')
                    // Nasconde i secondi
                    ->seconds(false),
            ])
            // Il form viene suddiviso in due colonne
            ->columns(2);
    }
}
