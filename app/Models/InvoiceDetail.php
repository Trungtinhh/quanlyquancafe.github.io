<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;
    protected $table = 'invoice_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'invoice_id',
        'drink_name',
        'table_name',
        'user_name',
        'time_in',
        'time_out',
        'total',
        'status',
    ];
    public function invoice()
    {
        return $this->hasOne('App\models\Invoice', 'id', 'invoice_id');
    }
}
