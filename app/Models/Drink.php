<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    use HasFactory;
    protected $table = 'drinks';
    protected $primaryKey = 'drink_id';

    protected $fillable = [
        'drink_id',
        'drink_name',
        'category',
        'menu_category_id'
    ];
    public function drinkDetail()
    {
        return $this->hasOne('App\Models\DrinkDetail', 'drink_id', 'drink_id');
    }
    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'drink_id', 'drink_id');
    }
}
