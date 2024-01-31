<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipesModel extends Model
{
    use HasFactory;

    protected $table = 'recipes';
    protected $fillable = [
        'title',
        'image',
        'ingredients',
        'user_id',
        'category_id',
        

    ];
}
