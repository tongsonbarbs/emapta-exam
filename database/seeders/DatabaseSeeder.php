<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        \App\Models\Role::insert([
            ['id' => 1, 'name' => 'Admin'],
            ['id' => 2, 'name' => 'Client']
        ]);

        \App\Models\Interest::insert([
            ['name' => 'Reading'],
            ['name' => 'Cooking'],
            ['name' => 'Watching TV'],
            ['name' => 'Basketball'],
            ['name' => 'Coding'],
        ]);
    }
}
