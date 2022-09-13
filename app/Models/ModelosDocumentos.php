<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelosDocumentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_modelos',
        'id_documentos',
        'documento_nombre',
        'documento_formato',
        'ruta',
    ];
}
