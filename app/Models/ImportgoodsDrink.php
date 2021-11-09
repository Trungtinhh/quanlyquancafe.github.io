<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportgoodsDrink extends Model
{
    use HasFactory;
    protected $table = 'importgoods_drinks';
    protected $primaryKey  = 'id';

    protected $fillable = [
        'id',
        'drink_id',
        'amount_add',
        'date_add'
    ];
    public function drink()
    {
        return $this->belongsTo('App\Models\Drink', 'drink_id', 'drink_id');
    }
}
