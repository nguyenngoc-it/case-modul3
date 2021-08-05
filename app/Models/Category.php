<?php

namespace App\Models;

use App\Http\Controllers\FoodsController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function foods()
    {
        return $this->hasMany(Foods::class);
    }
}
