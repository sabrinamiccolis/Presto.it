<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'title' => $this->faker->words(3, true),
            'body' => $this->faker->paragraph(),
            'price' => rand(10, 99999),
            'created_at' => $this->faker->date('Y-m-d'),
        ];
    }

    /**
     * Configure the factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (\App\Models\Announcement $announcement) {
            \App\Models\Image::factory(rand(1, 5))->create(['announcement_id' => $announcement->id]);
        });
    }
}
