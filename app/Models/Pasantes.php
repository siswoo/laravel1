<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasantes extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_users',
        'sede',
        'estatus',
    ];
}
