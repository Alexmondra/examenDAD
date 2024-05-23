<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entrada extends Model
{
    use HasFactory;
    protected $table="entradas";
    
    protected $fillable = [
        'placa',
        'fecha_entrada',
        'fecha_salida',
       
    ];
}
