<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table = 'areas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'sub_name',
    ];

    public function table(){
        return $this->belongsTo('App\models\Table', 'id', 'sub_id');
    }
}
