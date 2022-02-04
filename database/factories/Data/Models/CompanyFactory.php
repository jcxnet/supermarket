<?php

namespace Database\Factories\Data\Models;

use App\Data\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class CompanyFactory extends Factory
{
    protected $model = Company::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->company();
        $cif = $this->faker->randomLetter.substr($this->faker->uuid3(), 0, 8);
        return [
            'id' => Uuid::uuid4(),
            'name' => Str::of($name)->title(),
            'cif' =>  Str::upper($cif)
        ];
    }
}
