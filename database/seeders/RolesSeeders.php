<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::factory()->create([
            'nombre' => 'Admin',
            'estatus' => 1,
        ]);

        Roles::factory()->create([
            'nombre' => 'Pasantia Vip Occidente',
            'estatus' => 1,
        ]);

        Roles::factory()->create([
            'nombre' => 'Pasantia Norte',
            'estatus' => 1,
        ]);

        Roles::factory()->create([
            'nombre' => 'Pasantia Tunal',
            'estatus' => 1,
        ]);

        Roles::factory()->create([
            'nombre' => 'Pasantia Vip Suba',
            'estatus' => 1,
        ]);

        Roles::factory()->create([
            'nombre' => 'Pasantia Soacha',
            'estatus' => 1,
        ]);

        Roles::factory()->create([
            'nombre' => 'Pasantia Bucaramanga',
            'estatus' => 1,
        ]);

        Roles::factory()->create([
            'nombre' => 'Pasantia Cali',
            'estatus' => 1,
        ]);

        Roles::factory()->create([
            'nombre' => 'Pasantia Satelite',
            'estatus' => 1,
        ]);

        Roles::factory()->create([
            'nombre' => 'Pasante',
            'estatus' => 1,
        ]);

        Roles::factory()->create([
            'nombre' => 'RRHH Vip Occidente',
            'estatus' => 1,
        ]);
        
    }
}
