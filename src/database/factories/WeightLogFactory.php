<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\WeightLog;

class WeightLogFactory extends Factory
{
    protected $model=WeightLog::class;

    public function definition()
    {
        return [
            'user_id'=>\App\Models\User::factory(),//一人のユーザーに紐付け
            'date'=>$this->faker->date(),
            'weight'=>$this->faker->numberBetween(50, 100),
            'calories'=>$this->faker->numberBetween(200, 500),
            'exercise_time'=>sprintf('%02d:%02d',$this->faker->numberBetween(0, 23),$this->faker->numberBetween(0, 59)),
            'exercise_content'=>$this->faker->text(120),
        ];
    }
}
