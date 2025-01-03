<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deuda extends Model
{
    use HasFactory;

    // Especifica la tabla si no sigue las convenciones
    protected $table = 'deudas';

    // Si no usarás `timestamps`, puedes deshabilitarlos
    public $timestamps = true;

    // Define los campos que puedes asignar en masa
    protected $fillable = [
        'nombre_colegio',
        'cantidad_deuda',
        'producto_entregado',
        'fecha_entrega',
        'email_contacto',
        'tiempo',
        'signo',
        'intensidad',
        'idioma',
        'pdf_documento',   // Agregado
        'pdf_tipo',
        'email_marketing',
        'cobrar',
        'telefono_1',
        'telefono_2',  // Agregado
    ];
}
