<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactFactory extends Factory
{
    protected $model = Contact::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = DB::table('categories')->pluck('id')->toArray();

        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement([1, 2, 3]),
            'email' => $this->faker->unique()->safeEmail(),
            'tel1' => $this->faker->numerify('###'),
            'tel2' => $this->faker->numerify('####'),
            'tel3' => $this->faker->numerify('####'),
            'address' => $this->faker->address(),
            'building' => $this->faker->secondaryAddress(),
            'detail' => $this->faker->realText(120),
            'category_id' => $categories[array_rand($categories)],
        ];
    }
}
