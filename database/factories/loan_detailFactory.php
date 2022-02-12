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
       $num_pay =  $this->faker->numberBetween(2,3);
       $start_date = $this->faker->dateTimeBetween('-2 years', '-1years')->format('Y-m-d');
       $end_date = $this->faker->dateTimeBetween( $start_date, '+'.$num_pay.' month')->format('Y-m-d');
        return [
            'clientid' => $this->faker->numberBetween(1,50),
            'num_of_payment' => $num_pay,
            'first_payment_date' => $end_date,
            'last_payment_date' => $this->faker->dateTimeThisMonth()->format('Y-m-d'),
            'loan_amount' => $this->faker->numberBetween(50,500),
        ];
    }
}
