<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportgoodsIngredent extends Model
{
    use HasFactory;
    protected $table = 'importgoods_ingredents';
    protected $primaryKey  = 'id';

    protected $fillable = [
        'id',
        'ingredent_id',
        'amount_add',
        'date_add'
    ];
    public function ingredent()
    {
        return $this->belongsTo('App\Models\Ingredent', 'ingredent_id', 'ingredent_id');
    }
}
