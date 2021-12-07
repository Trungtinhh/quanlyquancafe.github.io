<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'order_id',
        'table_name',
        'user_name',
        'drink_name',
        'drink_amount',
        'price',
        'status'
    ];

    public function order()
    {
        return $this->hasOne('App\models\Order', 'order_id', 'id');
    }
}
