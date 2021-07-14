<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        $jay = User::create([
            'name' =>    "Jay",
            'email' =>  "jaylong255@gmail.com",
            'password'  =>  Hash::make('Test123$')
        ]);

    }
}
