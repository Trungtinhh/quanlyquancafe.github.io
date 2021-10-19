<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeKeeping extends Model
{
    use HasFactory;
    protected $table = 'time_keepings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'user_id',
        'time_start',
        'time_end',
        'hour',
        'status',
        'status_edit',
    ];
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
