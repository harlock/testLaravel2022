<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;
    protected $table="personas";
    protected $primaryKey="id_persona";
    protected $fillable=['nombre','apellidos','id_estado_civil', 'direccion', 'correo','password'];
}
