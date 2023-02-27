<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tablageneral
 *
 * @property $id
 * @property $DNI
 * @property $created_at
 * @property $updated_at
 *
 * @property Tablausuario[] $tablausuarios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tablageneral extends Model
{

    static $rules = [
		'DNI' => 'required',
    ];

    protected $perPage = 20;

    protected $table="tablageneral";

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['DNI'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tablausuarios()
    {
        return $this->hasMany('App\Models\Tablausuario', 'idusuario', 'id');
    }


}
