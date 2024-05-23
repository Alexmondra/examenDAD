<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehiculo extends Model
{
    use HasFactory;
    protected $table="vehiculos";
    
    protected $fillable = [
        'id_categoria',
        'placa',
        'modelo',
        'propietario',
    ];
}
