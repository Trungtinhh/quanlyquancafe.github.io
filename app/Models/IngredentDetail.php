<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredentDetail extends Model
{
    use HasFactory;
    protected $table = 'ingredent_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'ingredent_id',
        'ingredent_name',
        'price_id',
        'provider_id',
        'amount',
        'date_add',
        'date_exp'
    ];
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
        return $this->belongsTo('App\Models\Provider', 'provider_id', 'id');
    }
}
