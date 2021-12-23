<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'table_id',
        'user_id',
        'drink_id',
        'drink_amount',
        'status',
        'status_bartending'
    ];
    public function table()
    {
        return $this->hasOne('App\models\Table', 'id', 'table_id');
    }
    public function user()
    {
        return $this->hasOne('App\models\User', 'user_id', 'id');
    }
    public function drink()
    {
        return $this->hasOne('App\models\Drink', 'drink_id', 'drink_id');
    }
    public function invoice()
    {
        return $this->belongsTo('App\models\Invoice', 'id', 'order_id');
    }
    public function orderDetail()
    {
        return $this->belongsTo('App\models\OrderDetail', 'id', 'order_id');
    }
}
