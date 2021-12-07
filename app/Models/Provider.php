<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    protected $table = 'providers';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'provider_name',
        'phone',
        'email',
        'address',
        'image',
        'relationship'
    ];
    public function drinkDetail()
    {
        return $this->hasOne('App\Models\DrinkDetail', 'id', 'provider_id');
    }
}
