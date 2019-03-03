<?php

use Illuminate\Database\Seeder;

class TypeTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tipo_transaccion')->insert([
          'ttr_sigla' => 'P.D',
          'ttr_nombre' => 'Productos o servicios',
          'ttr_descripcion' => '...',
      ]);

      DB::table('tipo_transaccion')->insert([
          'ttr_sigla' => 'T.E',
          'ttr_nombre' => 'Transacciones o ayudas monetarias',
          'ttr_descripcion' => '...',
      ]);

    }
}
