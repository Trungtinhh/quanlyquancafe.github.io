<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'order_id',
        'table_id',
        'user_id',
        'total',
        'submoney',
        'time_in',
        'time_out',
        'status',
    ];

    public function order()
    {
        return $this->hasOne('App\models\Order', 'id', 'order_id');
    }
    public function table()
    {
        return $this->hasOne('App\models\Table', 'id', 'table_id');
    }
    public function user()
    {
        return $this->hasOne('App\models\User', 'id', 'user_id');
    }
    public function invoiceDetail()
    {
        return $this->belongsTo('App\models\InvoiceDetail', 'id', 'invoice_id');
    } 
}
