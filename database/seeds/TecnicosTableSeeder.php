<?php

use Illuminate\Database\Seeder;
use App\Tecnico;

class TecnicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        Tecnico::create([
            'name' => 'Mario',
            'description' => 'El bueno'
        ]);
        Tecnico::create([
            'name' => 'César',
            'description' => 'El malo'
        ]);
        Tecnico::create([
            'name' => 'Fernando',
            'description' => 'El feo'
        ]);
    }
}
