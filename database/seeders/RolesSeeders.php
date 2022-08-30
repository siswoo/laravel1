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
    }
}
