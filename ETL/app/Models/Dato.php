<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dato extends Model
{
    public $table = "dato";
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'name'
    ];
}
