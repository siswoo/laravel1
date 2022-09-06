<?php

namespace Database\Seeders;

use App\Models\Pasantes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasanteSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pasantes::factory()->create([
            'id_users' => 1,
            'sede' => 1,
            'estatus' => 1,
        ]);
    }
}
