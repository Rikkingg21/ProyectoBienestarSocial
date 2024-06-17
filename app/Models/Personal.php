<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Personal extends Model
{
    protected $table = 'personal';
    protected $primaryKey = 'DNI';
    public $incrementing = false;
    public $timestamps = false;

    // Ejemplo de relación con PersonalCit (uno a muchos)
    public function personalCits()
    {
        return $this->hasMany(PersonalCit::class, 'DNI', 'DNI');
    }
}
