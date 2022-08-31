<?php

namespace Database\Seeders;

use App\Models\Sedes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SedesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sedes::factory()->create([
            'nombre' => 'VIP Occidente',
            'ciudad' => 'Bogotá D.C',
            'descripcion' => 'BERNAL GROUP SAS',
            'responsable' => 'Andres Fernando Bernal Correa',
            'cedula' => '80.774.671',
            'rut' => '901.257.204-8',
        ]);

        Sedes::factory()->create([
            'nombre' => 'Norte',
            'ciudad' => 'Bogotá D.C',
            'descripcion' => 'BERNAL GROUP SAS',
            'responsable' => 'Andres Fernando Bernal Correa',
            'cedula' => '80.774.671',
            'rut' => '901.257.204-8',
        ]);

        Sedes::factory()->create([
            'nombre' => 'Tunal',
            'ciudad' => 'Bogotá D.C',
            'descripcion' => 'BERNAL GROUP SAS',
            'responsable' => 'Andres Fernando Bernal Correa',
            'cedula' => '80.774.671',
            'rut' => '901.257.204-8',
        ]);

        Sedes::factory()->create([
            'nombre' => 'VIP Suba',
            'ciudad' => 'Bogotá D.C',
            'descripcion' => 'BERNAL GROUP SAS',
            'responsable' => 'Andres Fernando Bernal Correa',
            'cedula' => '80.774.671',
            'rut' => '901.257.204-8',
        ]);

        Sedes::factory()->create([
            'nombre' => 'Soacha',
            'ciudad' => 'Bogotá D.C',
            'descripcion' => 'BERNAL GROUP SAS',
            'responsable' => 'Andres Fernando Bernal Correa',
            'cedula' => '80.774.671',
            'rut' => '901.257.204-8',
        ]);

        Sedes::factory()->create([
            'nombre' => 'Bucaramanga',
            'ciudad' => 'Bogotá D.C',
            'descripcion' => 'BERNAL GROUP SAS',
            'responsable' => 'Andres Fernando Bernal Correa',
            'cedula' => '80.774.671',
            'rut' => '901.257.204-8',
        ]);
        Sedes::factory()->create([
            'nombre' => 'Cali',
            'ciudad' => 'Bogotá D.C',
            'descripcion' => 'BERNAL GROUP SAS',
            'responsable' => 'Andres Fernando Bernal Correa',
            'cedula' => '80.774.671',
            'rut' => '901.257.204-8',
        ]);

        Sedes::factory()->create([
            'nombre' => 'Satelite',
            'ciudad' => 'Bogotá D.C',
            'descripcion' => 'BERNAL GROUP SAS',
            'responsable' => 'Andres Fernando Bernal Correa',
            'cedula' => '80.774.671',
            'rut' => '901.257.204-8',
        ]);
    }
}
