<?php

use Illuminate\Database\Seeder;
use App\User;

class PersonTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tipo_persona')->insert([
          'tpe_nombre' => 'Natural',
          'tpe_descripcion' => '...',
      ]);

      DB::table('tipo_persona')->insert([
          'tpe_nombre' => 'Juridica',
          'tpe_descripcion' => '...',
      ]);

    }
}
