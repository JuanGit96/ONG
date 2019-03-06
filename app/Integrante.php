<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{
    protected $table = 'integrantes';

    protected $primaryKey  = 'int_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'int_nombre',
        'int_edad',
        'int_identificacion',
        'int_foto',
    ];
}
