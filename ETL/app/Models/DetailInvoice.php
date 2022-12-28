<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailInvoice extends Model
{
    public $table = "detail_invoices";
    use HasFactory;
    protected $fillable = [
        'client_id',
        'agency_id',
        'invoice_id',
        'passit_id',
        'priceTotal'
    ];
}
