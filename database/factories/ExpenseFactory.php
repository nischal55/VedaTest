<?php

namespace Database\Factories;

use App\Models\CategoryExpenses;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => CategoryExpenses::factory(),
            'item_name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 1, 1000),
        ];
    }
}
