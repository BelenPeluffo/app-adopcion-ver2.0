<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'solicitudes';

    /**
     * Obtené la mascota a la que pertenece esta solicitud.
     */
    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }

    /**
     * Obtené el dueñx al que pertenece esta solicitud.
     */
    public function dueñx()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idMascota',
        'idPostulante',
        'idDueñx'
    ];
}
