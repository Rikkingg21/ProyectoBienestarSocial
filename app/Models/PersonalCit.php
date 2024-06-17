<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PersonalCit extends Model
{
    protected $table = 'personal_cit';
    public $timestamps = false;

    // Definir los atributos que se deben convertir a instancias de Carbon
    protected $dates = ['F_INICIO', 'F_FIN'];

    // Relación con el modelo Personal
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'DNI', 'DNI');
    }
}
