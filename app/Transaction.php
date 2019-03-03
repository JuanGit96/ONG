<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
  protected $table = 'transaccion';

  protected $primaryKey  = 'tra_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tra_estado',
        'ttr_valor',
        'usr_id',
        'ttr_id',
    ];

    public function user()
    {
      return $this->belongsTo(User::class,'usr_id');
    }

    public function transactionType()
    {
      return $this->belongsTo(TransactionType::class,'ttr_id');
    }
}
