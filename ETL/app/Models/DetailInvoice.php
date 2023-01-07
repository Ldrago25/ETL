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
    public function agency()
    {
        return $this->belongsto('App\Models\Agency');
    }
    public function invoice()
    {
        return $this->belongsto('App\Models\Invoice');
    }
    public function client()
    {
        return $this->belongsto('App\Models\Client');
    }
    public function passit()
    {
        return $this->belongsto('App\Models\Passit');
    }
}
