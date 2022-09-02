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

        Modulos::factory()->create([
            'nombre' => 'Crear Pasante',
            'id_roles' => 2,
            'route' => 'pasantiaVip.create',
            'estatus' => 1,
        ]);

        Modulos::factory()->create([
            'nombre' => 'Crear Pasante',
            'id_roles' => 3,
            'route' => 'pasantiaNorte.create',
            'estatus' => 1,
        ]);

        Modulos::factory()->create([
            'nombre' => 'Crear Pasante',
            'id_roles' => 4,
            'route' => 'pasantiaTunal.create',
            'estatus' => 1,
        ]);

        Modulos::factory()->create([
            'nombre' => 'Crear Pasante',
            'id_roles' => 5,
            'route' => 'pasantiaVipSuba.create',
            'estatus' => 1,
        ]);

        Modulos::factory()->create([
            'nombre' => 'Crear Pasante',
            'id_roles' => 6,
            'route' => 'pasantiaSoacha.create',
            'estatus' => 1,
        ]);

        Modulos::factory()->create([
            'nombre' => 'Crear Pasante',
            'id_roles' => 7,
            'route' => 'pasantiaBucaramanga.create',
            'estatus' => 1,
        ]);

        Modulos::factory()->create([
            'nombre' => 'Crear Pasante',
            'id_roles' => 8,
            'route' => 'pasantiaCali.create',
            'estatus' => 1,
        ]);

        Modulos::factory()->create([
            'nombre' => 'Crear Pasante',
            'id_roles' => 9,
            'route' => 'pasantiaSatelite.create',
            'estatus' => 1,
        ]);

        Modulos::factory()->create([
            'nombre' => 'Sedes',
            'id_roles' => 1,
            'route' => 'sedes.index',
            'estatus' => 1,
        ]);

        Modulos::factory()->create([
            'nombre' => 'Información',
            'id_roles' => 10,
            'route' => 'pasantes.info',
            'estatus' => 1,
        ]);

        Modulos::factory()->create([
            'nombre' => 'Pasantes',
            'id_roles' => 11,
            'route' => 'pasantesVip.index',
            'estatus' => 1,
        ]);

        Modulos::factory()->create([
            'nombre' => 'Modelos',
            'id_roles' => 11,
            'route' => 'modelosVip.index',
            'estatus' => 1,
        ]);
    }
}
