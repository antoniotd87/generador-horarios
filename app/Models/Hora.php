<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Hora
 *
 * @property $id
 * @property $hora
 * @property $created_at
 * @property $updated_at
 *
 * @property Horario[] $horarios
 * @property HorarioDisponible[] $horarioDisponibles
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Hora extends Model
{
    
    static $rules = [
		'hora' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['hora'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarios()
    {
        return $this->hasMany('App\Models\Horario', 'hora_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarioDisponibles()
    {
        return $this->hasMany('App\Models\HorarioDisponible', 'hora_id', 'id');
    }
    

}
