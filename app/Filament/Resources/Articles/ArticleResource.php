<?php

namespace App\Filament\Resources\Articles;

use App\Filament\Resources\Articles\Pages\CreateArticle;
use App\Filament\Resources\Articles\Pages\EditArticle;
use App\Filament\Resources\Articles\Pages\ListArticles;
use App\Filament\Resources\Articles\Pages\ViewArticle;
use App\Filament\Resources\Articles\Schemas\ArticleForm;
use App\Filament\Resources\Articles\Schemas\ArticleInfolist;
use App\Filament\Resources\Articles\Tables\ArticlesTable;
use App\Models\Article;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ArticleResource extends Resource
{
    // Model associato a questa Resource
    protected static ?string $model = Article::class;

    //Icona visualizzata nel menu laterale
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    // Nome visualizzato nel menu laterale
    protected static ?string $navigationLabel = 'Articoli';

    // Nome del singolo record
    protected static ?string $modelLabel = 'Articolo';

    // Nome utilizzato per il plurale
    protected static ?string $pluralModelLabel = 'Articoli';

    //Campo utilizzato come titolo del record
    protected static ?string $recordTitleAttribute = 'name';


    // Configura il form di creazione e modifica
    public static function form(Schema $schema): Schema
    {
        return ArticleForm::configure($schema);
    }


    // Configura la pagina di visualizzazione del record
    public static function infolist(Schema $schema): Schema
    {
        return ArticleInfolist::configure($schema);
    }


    // Configura la tabella con l'elenco degli articoli
    public static function table(Table $table): Table
    {
        return ArticlesTable::configure($table);
    }

    // Definisce eventuali Resource collegate (ad esempio Commenti, Tag, ecc.)
    public static function getRelations(): array
    {
        return [
            //
        ];
    }


    // Definisce tutte le pagine della Resource
    public static function getPages(): array
    {
        return [
            'index' => ListArticles::route('/'),
            'create' => CreateArticle::route('/create'),
            'view' => ViewArticle::route('/{record}'),
            'edit' => EditArticle::route('/{record}/edit'),
        ];
    }
}
