<?php

namespace Database\Factories;

use App\Models\ServiceOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceOrderFactory extends Factory
{
    protected $model = ServiceOrder::class;

    public function definition()
    {
        $plate = $this->faker->regexify('[A-Z]{3}[0-9]{4}');
        
        return [
            'vehiclePlate' => $plate,
            'entryDateTime' => $this->faker->dateTimeThisYear,
            'exitDateTime' => $this->faker->dateTimeThisYear,
            'priceType' => $this->faker->randomElement(['dia', 'noite']),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'userId' => function () {
                return \App\Models\User::factory()->create()->id;
            },
        ];
    }
}
