<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'nombre' => 'Juan',
            'apellido' => 'Maldonado',
            'documento_tipo' => 'PEP',
            'documento_numero' => '5133444',
            'usuario' => 'JDolarJ',
            'password' => '2421187',
            'email' => 'juanmaldonado.co@gmail.com',
            'genero' => 'Masculino',
            'telefono' => '3016984868',
            'estatus' => 1,
        ]);
        User::factory(10)->create();

        /*****Se comento la creacion individual porque estoy usando un UserFactory */
        /*
        User::factory()->create([
            'nombre' => 'Juan',
            'apellido' => 'Maldonado',
            'documento_tipo' => 'PEP',
            'documento_numero' => '5133444',
            'usuario' => 'JDolarJ',
            'password' => '2421187',
            'email' => 'juanmaldonado.co@gmail.com',
            'estatus' => 1,
        ]);
        */
    }
}
