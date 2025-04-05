<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WeightLog;
Use App\Models\WeightTarget;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Test User',
            'email'=>'test@example.com',
            'password'=>Hash::make('password123'),
        ]);
          



        $this->call(Weight_logsTableSeeder::class);
        $this->call(Weight_targetsTableSeeder::class);
    }
}
