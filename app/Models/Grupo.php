<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Grupo
 *
 * @property $id
 * @property $grupo
 * @property $jefe_de_grupo
 * @property $total
 * @property $semestre_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Clase[] $clases
 * @property Horario $horario
 * @property MateriaGrupo[] $materiaGrupos
 * @property Semestre $semestre
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Grupo extends Model
{

    static $rules = [
        'grupo' => 'required',
        'jefe_de_grupo' => 'required',
        'total' => 'required',
        'semestre_id' => 'required',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['grupo', 'jefe_de_grupo', 'total', 'semestre_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clases()
    {
        return $this->hasMany('App\Models\Clase', 'grupo_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function horario()
    {
        return $this->hasMany('App\Models\Horario', 'grupo_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materiaGrupos()
    {
        return $this->hasMany('App\Models\MateriaGrupo', 'grupo_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function semestre()
    {
        return $this->hasOne('App\Models\Semestre', 'id', 'semestre_id');
    }
}
