<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'mail' => $this->faker->unique()->safeEmail(),
            'age' => random_int(1,99),
        ];
    }

    // $factory->state(Person::class, 'upper', function($faker)
    // {
    //     return [
    //         'name' => strtoupper($faker->name()),
    //     ];
    // });

    public function upper()
    {
        return $this->state(function () {
            return [
                'name' => strtoupper($this->faker->name()),
            ];
        });
    }

    public function lower()
    {
        return $this->state(function () {
            return [
                'name' => strtolower($this->faker->name()),
            ];
        });
    }

    public function configure()
    {
        return $this->afterMaking(function (Person $person) {
            $person->name .= ' [making]';
            $person->save();
        })->afterCreating(function (Person $person) {
            $person->name .= ' [creating]';
            $person->save();
        });
    }
}
