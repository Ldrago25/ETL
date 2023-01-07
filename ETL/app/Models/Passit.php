<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passit extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'price',
        'unitCost',
        'iva'
    ];
    public function detailinvoice()
    {
        return $this->hasMany('App\Models\DetailInvoice');
    }
}
