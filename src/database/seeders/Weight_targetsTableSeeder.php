<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class Weight_targetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::first(); //初期データの一人目のユーザーを取得

        if($user){
            DB::table('weight_targets')->insert([
                'user_id'=>$user->id,
                'target_weight'=>45.0,

            ]);
        }
    }
}
