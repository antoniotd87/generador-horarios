<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MateriaGrupo
 *
 * @property $id
 * @property $materia_id
 * @property $grupo_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Grupo $grupo
 * @property Materia $materia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MateriaGrupo extends Model
{

    static $rules = [
		'materia_id' => 'required',
		'grupo_id' => 'required',
    ];

    public $table = 'materia_grupo';

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['materia_id','grupo_id'];


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
    public function materia()
    {
        return $this->hasOne('App\Models\Materia', 'id', 'materia_id');
    }


}
