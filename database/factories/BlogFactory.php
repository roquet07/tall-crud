<?php

namespace Database\Factories;

use App\Models\Blog;
use Faker\Core\File;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{

    protected $model = Blog::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      

        $name = $this->faker->unique()->word(20);
        return [
            'title' => $name,
            'description' => $this->faker->text(250),
            'status' => $this->faker->randomElement([false, true]),
            'url_img' => 'blogs/' . $this->faker->image('public/storage/blogs', 640, 480, null, false)
        ];
    }
}
