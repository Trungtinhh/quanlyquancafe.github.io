<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    protected $table = 'shifts';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'time_start',
        'time_end',
        'color',
    ];
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function calendar(){
        return $this->hasMany('App\Models\Calendar', 'shift_id', 'id');
    }

}
