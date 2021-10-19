<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    protected $table = 'calendars';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'date',
        'user_id',
        'shift_id',
    ];
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function shift(){
        return $this->belongsTo('App\Models\Shift', 'shift_id', 'id');
    }
}
