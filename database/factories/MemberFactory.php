<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Member::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'member_no' => Str::random(10),
            'winner' => false,
        ];
    }
}
