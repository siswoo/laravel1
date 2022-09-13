<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = User::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'apellido' => $this->faker->address(),
            'documento_tipo' => $this->faker->randomElement(['Cedula de Ciudadania','Cedula de Extranjeria','Pasaporte','PEP']),
            'documento_numero' => $this->faker->unique()->randomNumber($nbDigits = NULL, $strict = false),
            'usuario' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => $this->faker->password(),
            //'rol1' => 1,
            //'avatar'=> $this->faker->text($maxNbChars = 200),
            'avatar' => $this->faker->imageUrl($width = 640, $height = 480),
            'genero' => $this->faker->randomElement(['Masculino','Femenino','Transexual']),
            'estatus' => 1,
            'codigo_telefono' => '57',
            'telefono' => '3016984868',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
