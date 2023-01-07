<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'haveSouce',
    ];
        
    public function detailinvoice()
    {
        return $this->hasMany('App\Models\DetailInvoice');
    }
}
