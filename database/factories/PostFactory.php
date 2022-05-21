<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public $counter = 500;
    public function definition()
    {
        $this->counter++;
        return [
            'title'         => $this->faker->name,
            'content'       => $this->faker->text(50),
            'image'         => "https://placedog.net/".$this->counter."/".$this->counter,
            'likes'         => 0,
            'is_published'    => 1,
            'created_at'    => now(),
            'category_id'   => Category::get()->random()->id
        ];
    }
}
