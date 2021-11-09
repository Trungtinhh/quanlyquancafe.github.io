<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $table = 'tables';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'table_name',
        'sub_id',
        'status',
    ];

    public function area(){
        return $this->hasOne('App\Models\Area', 'id', 'sub_id');
    }
}
