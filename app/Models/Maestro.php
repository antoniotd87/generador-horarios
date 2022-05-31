<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Maestro
 *
 * @property $id
 * @property $uid
 * @property $docente
 * @property $grado_de_estudios
 * @property $division
 * @property $created_at
 * @property $updated_at
 *
 * @property Clase[] $clases
 * @property Horario[] $horarios
 * @property HorarioDisponible[] $horarioDisponibles
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Maestro extends Model
{

    static $rules = [
		'uid' => 'required',
		'docente' => 'required',
		'grado_de_estudios' => 'required',
		'division' => 'required',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['uid','docente','grado_de_estudios','division'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clases()
    {
        return $this->hasMany('App\Models\Clase', 'maestro_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarios()
    {
        return $this->hasMany('App\Models\Horario', 'maestro_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarioDisponibles()
    {
        return $this->hasMany('App\Models\HorarioDisponible', 'maestro_id', 'id');
    }


}
