<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            "name" => $this->faker->sentence,
            'name_tr' => $this->faker->sentence,
            "featured_image" => "https://picsum.photos/1200/800",
            "location_id" => Location::all()->random()->id,
            "price" => rand(100000,500000),
            "sale" => rand(0,1),
            "type"=> rand(0,2),
            "bedrooms"=> rand(1,6),
            "bathrooms"=> rand(1,5),
            "net_sqr"=> rand(55,300),
            "gress_sqrt"=> rand(65,456),
            "overview"=> $this->faker->text(maxNbChars: 100),
            'overview_tr' => $this->faker->text(100),
            "pool"=> rand(0,3),
            "why_buy"=> $this->faker->text(maxNbChars: 1000),
            "why_buy_tr"=> $this->faker->text(maxNbChars: 1000),
            "description"=> $this->faker->text(maxNbChars: 500),
            'description_tr' => $this->faker->text(500)
        ];
    }
}
