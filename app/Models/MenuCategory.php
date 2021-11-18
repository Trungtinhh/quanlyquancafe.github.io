<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    use HasFactory;
    protected $table = 'menu_categorys';
    protected $primaryKey = 'menu_category_id';

    protected $fillable = [
        'menu_category_id',
        'menu_category_name'
    ];
}
