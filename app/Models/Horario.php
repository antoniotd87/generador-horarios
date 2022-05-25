<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Horario
 *
 * @property $id
 * @property $maestro_id
 * @property $materia_id
 * @property $grupo_id
 * @property $hora_id
 * @property $dia_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Dia $dia
 * @property Grupo $grupo
 * @property Hora $hora
 * @property Maestro $maestro
 * @property Materia $materia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Horario extends Model
{

    static $rules = [
		'maestro_id' => 'required',
		'materia_id' => 'required',
		'grupo_id' => 'required',
		'hora_id' => 'required',
		'dia_id' => 'required',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['maestro_id','materia_id','grupo_id','hora_id','dia_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dia()
    {
        return $this->hasOne('App\Models\Dia', 'id', 'dia_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function grupo()
    {
        return $this->hasOne('App\Models\Grupo', 'id', 'grupo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hora()
    {
        return $this->hasOne('App\Models\Hora', 'id', 'hora_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function maestro()
    {
        return $this->hasOne('App\Models\Maestro', 'id', 'maestro_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function materia()
    {
        return $this->hasOne('App\Models\Materia', 'id', 'materia_id');
    }


}
