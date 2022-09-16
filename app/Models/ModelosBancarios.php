<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelosBancarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_modelos',
        'cpp',
        'documento_tipo',
        'documento_numero',
        'nombre',
        'tipo_cuenta',
        'numero_cuenta',
        'banco',
        'documento',
    ];
}
