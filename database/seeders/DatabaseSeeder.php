<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('alerts')->insert([
            'name' => 'Alerte 1',
            'city' => 'Lyon',
            'aqius' => 20,
            'movement' => '+'
        ]);

        DB::table('alerts')->insert([
            'name' => 'Alerte 2',
            'city' => 'Annecy',
            'aqius' => 2,
            'movement' => '-'
        ]);
    
    }
}
