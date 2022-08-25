<?php

namespace Database\Seeders;

use App\Models\Modulos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModulosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modulos::factory()->create([
            'nombre' => 'Roles',
            'id_roles' => 1,
            'route' => 'roles.index',
            'estatus' => 1,
        ]);

        Modulos::factory()->create([
            'nombre' => 'Modulos',
            'id_roles' => 1,
            'route' => 'modulos.index',
            'estatus' => 1,
        ]);

        Modulos::factory()->create([
            'nombre' => 'Usuarios',
            'id_roles' => 1,
            'route' => 'usuarios.index',
            'estatus' => 1,
        ]);
    }
}
