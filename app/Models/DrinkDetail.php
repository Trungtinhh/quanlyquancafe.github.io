<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrinkDetail extends Model
{
    use HasFactory;
    protected $table = 'drink_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'drink_id',
        'ingredent_id',
        'price_id',
        'provider_id',
        'amount',
        'date_add',
        'date_exp'
    ];
    public function drink()
    {
        return $this->belongsTo('App\Models\Drink', 'drink_id', 'drink_id');
    }
    public function ingredent()
    {
        return $this->belongsTo('App\Models\Ingredent', 'ingredent_id', 'ingredent_id');
    }
    public function price()
    {
        return $this->belongsTo('App\Models\Price', 'price_id', 'price_id');
    }
    public function provider()
    {
        return $this->belongsTo('App\Models\Provider', 'provider_id', 'provider_id');
    }
}
