<?php

use Illuminate\Database\Seeder;
use App\User;

class DocuemtTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('tipo_documento')->insert([
              'tdo_siglas' => 'NIT',
              'tdo_descripcion' => '...',
          ]);

          DB::table('tipo_documento')->insert([
              'tdo_siglas' => 'c.c.',
              'tdo_descripcion' => '...',
          ]);

          DB::table('tipo_documento')->insert([
              'tdo_siglas' => 'C.E.',
              'tdo_descripcion' => '...',
          ]);

          DB::table('tipo_documento')->insert([
              'tdo_siglas' => 'P.A.',
              'tdo_descripcion' => '...',
          ]);

    }
}
