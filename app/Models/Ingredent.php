<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredent extends Model
{
    use HasFactory;
    protected $table = 'ingredents';
    protected $primaryKey = 'ingredent_id';

    protected $fillable = [
        'ingredent_id',
        'ingredent_name'
    ];
}
