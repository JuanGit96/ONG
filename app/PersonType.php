<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonType extends Model
{
  protected $table = 'tipo_persona';

  protected $primaryKey  = 'tpe_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tpe_nombre',
        'tpe_descripcion',
    ];
}
