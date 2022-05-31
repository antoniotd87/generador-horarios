<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Materia
 *
 * @property $id
 * @property $clave
 * @property $materia
 * @property $creditos
 * @property $carrera
 * @property $horas
 * @property $semestre_id
 * @property $especialidad
 * @property $created_at
 * @property $updated_at
 *
 * @property Clase[] $clases
 * @property Horario[] $horarios
 * @property MateriaGrupo[] $materiaGrupos
 * @property Semestre $semestre
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Materia extends Model
{

    static $rules = [
		'clave' => 'required',
		'materia' => 'required',
		'creditos' => 'required',
		'carrera' => 'required',
		'horas' => 'required',
		'semestre_id' => 'required',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['clave','materia','creditos','carrera','horas','semestre_id','especialidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clases()
    {
        return $this->hasMany('App\Models\Clase', 'materia_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarios()
    {
        return $this->hasMany('App\Models\Horario', 'materia_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materiaGrupos()
    {
        return $this->hasMany('App\Models\MateriaGrupo', 'materia_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function semestre()
    {
        return $this->hasOne('App\Models\Semestre', 'id', 'semestre_id');
    }


}
