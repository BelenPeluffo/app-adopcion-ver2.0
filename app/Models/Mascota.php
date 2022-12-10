<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    /**
     * Obtené el user que es dueñx de esta mascota.
     */
    public function dueñx()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtené las solicitudes relacionadas a esta mascota.
     */
    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class,'idMascota');
    }
}
