<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'user_id',
        'email',
        'address',
        'phone',
        'birthday',
    ];
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
