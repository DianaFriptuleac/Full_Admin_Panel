<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'content',
        'image',
        'is_published',
        'published_at',
    ];

    // Converte automaticamente i valori nei relativi tipi PHP
    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }
    //ogni articolo appartiene ad una categoria
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
