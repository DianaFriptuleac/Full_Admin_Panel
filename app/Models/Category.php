<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // Indica quali campi possono essere assegnati in massa
    // In questo caso Laravel permette di salvare o modificare il campo "name"
    protected $fillable = ['name'];

    // Definisce la relazione tra Category e Idea
    // Una categoria può avere molte idee
    public function ideas()
    {
        // hasMany indica una relazione uno-a-molti
        // Laravel cerca nella tabella "ideas" una colonna chiamata "category_id"
        return $this->hasMany(Idea::class);
    }

    //Una categoria può contenere più articoli
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
