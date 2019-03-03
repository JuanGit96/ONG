<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
  protected $table = 'tipo_transaccion';

  protected $primaryKey  = 'ttr_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ttr_sigla',
        'ttr_nombre',
        'ttr_descripcion',
    ];
}
