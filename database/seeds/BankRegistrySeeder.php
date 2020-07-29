<?php

use Illuminate\Database\Seeder;

class BankRegistrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
     DB::table('bankregistry')->delete();

    
    }
}
