<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dia
 *
 * @property $id
 * @property $dia
 * @property $created_at
 * @property $updated_at
 *
 * @property Horario[] $horarios
 * @property HorarioDisponible[] $horarioDisponibles
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Dia extends Model
{

    static $rules = [
		'dia' => 'required',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarios()
    {
        return $this->hasMany('App\Models\Horario', 'dia_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarioDisponibles()
    {
        return $this->hasMany('App\Models\HorarioDisponible', 'dia_id', 'id');
    }


}
