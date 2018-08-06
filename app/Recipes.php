<?php
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Recipes extends Model
{
    protected $table = 'recipes';
 
    protected $fillable = [
        'recipe_code', 'recipe_name', 'recipe_description', 'recipe_author',
    ];
}