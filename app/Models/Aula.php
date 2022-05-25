<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Aula
 *
 * @property $id
 * @property $aula
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Aula extends Model
{

    static $rules = [
		'aula' => 'required',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['aula'];



}
