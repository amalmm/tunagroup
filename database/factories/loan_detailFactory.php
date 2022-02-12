<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class loan_detailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'clientid' => $this->faker->numberBetween(1,50),
            'num_of_payment' => $this->faker->numberBetween(1,5),
            'first_payment_date' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = '-1year')->format('Y-m-d'),
            'last_payment_date' => $this->faker->dateTimeThisMonth()->format('Y-m-d'),
            'loan_amount' => $this->faker->numberBetween(50,500),
        ];
    }
}
