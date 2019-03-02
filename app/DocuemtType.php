<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocuemtType extends Model
{
  protected $table = 'tipo_documento';

  protected $primaryKey  = 'tdo_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tdo_siglas',
        'tdo_descripcion',
    ];

}
