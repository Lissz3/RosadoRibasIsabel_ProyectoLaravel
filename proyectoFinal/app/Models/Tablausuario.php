<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tablausuario
 *
 * @property $id
 * @property $idusuario
 * @property $DNI
 * @property $nombre
 * @property $apellidos
 * @property $numcuenta
 * @property $created_at
 * @property $updated_at
 *
 * @property Tablageneral $tablageneral
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tablausuario extends Model
{

    static $rules = [
		'idusuario' => 'required',
		'DNI' => 'required',
		'nombre' => 'required',
		'apellidos' => 'required',
		'numcuenta' => 'required',
    ];

    protected $perPage = 20;

    protected $table="tablausuarios";

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idusuario','DNI','nombre','apellidos','numcuenta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tablageneral()
    {
        return $this->hasOne('App\Models\Tablageneral', 'id', 'idusuario');
    }


}
