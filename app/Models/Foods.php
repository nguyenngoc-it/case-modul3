<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    use HasFactory;
    protected $table='foods';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function store(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
       return $this->belongsTo(Store::class);
    }


}
