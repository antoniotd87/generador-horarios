<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Semestre
 *
 * @property $id
 * @property $semestre
 * @property $created_at
 * @property $updated_at
 *
 * @property Materia[] $materias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Semestre extends Model
{
    
    static $rules = [
		'semestre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['semestre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materias()
    {
        return $this->hasMany('App\Models\Materia', 'semestre_id', 'id');
    }
    

}
