<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Game;

class GameFactory extends Factory
{
    protected $model = Game::class;

    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'developer' => $this->faker->company,
            'genre' => $this->faker->randomElement(['Action', 'RPG', 'Strategy', 'Adventure']),
            'release_date' => $this->faker->date(),
            'platform' => $this->faker->randomElement(['PC', 'PlayStation', 'Xbox']),
            'price' => $this->faker->randomFloat(2, 9.99, 59.99),
            'cover_image' => $this->faker->imageUrl(200, 300, 'games'),
        ];
    }
}
