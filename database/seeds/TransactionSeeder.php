<?php

use Illuminate\Database\Seeder;
use App\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  $count = (int)$this->command->ask('Cuantos Transacciones necesitas ?');


      $users = factory(Transaction::class, $count)->create();

      $this->command->info('¡Transacciones creadas!');
    }
}
