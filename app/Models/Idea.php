<?php

namespace App\Models;

use App\Enums\Priority;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Idea extends Model
{
     // Indica quali campi possono essere assegnati in massa
    // Questi campi possono essere usati, ad esempio, con Idea::create($dati)
    protected $fillable = ['title', 'description', 'status', 'category', 'category_id'];

    // Converte automaticamente alcuni valori del database
    // negli enum corrispondenti quando Laravel legge il record
    protected $casts = [
         // Il campo "status" viene convertito nell'enum Status
        'status' => Status::class,
         // Il campo "priority" viene convertito nell'enum Priority
        'priority' => Priority::class
    ];
      
    // Definisce la relazione tra Idea e Category
    // Il tipo di ritorno BelongsTo indica che ogni idea appartiene a una categoria
      public function category():BelongsTo
    {
        // Laravel collega il campo "category_id" della tabella "ideas"
        // con il campo "id" della tabella "categories"
        return $this->belongsTo(Category::class);
    }
}
