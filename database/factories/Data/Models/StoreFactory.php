<?php

namespace Database\Factories\Data\Models;

use App\Data\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class StoreFactory extends Factory
{
    protected $model = Store::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->company();
        $address = str_replace(PHP_EOL,', ',$this->faker->address());

        return [
            'id' => Uuid::uuid4(),
            'name' => Str::of($name)->title(),
            'address' => $address,
            'url' => $this->faker->url()
        ];
    }
}
