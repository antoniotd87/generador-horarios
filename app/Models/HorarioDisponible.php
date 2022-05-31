<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HorarioDisponible
 *
 * @property $id
 * @property $maestro_id
 * @property $dia_id
 * @property $hora_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Dia $dia
 * @property Hora $hora
 * @property Maestro $maestro
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class HorarioDisponible extends Model
{

    static $rules = [
		'maestro_id' => 'required',
		'dia_id' => 'required',
		'hora_id' => 'required',
    ];

    public $table = 'horario_disponible';

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['maestro_id','dia_id','hora_id'];


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


}
