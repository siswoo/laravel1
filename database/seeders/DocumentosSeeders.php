<?php

namespace Database\Seeders;

use App\Models\Documentos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Documentos::factory()->create([
            'nombre' => 'Firma',
        ]);

        Documentos::factory()->create([
            'nombre' => 'RUT',
        ]);

        Documentos::factory()->create([
            'nombre' => 'Certificación Bancaria',
        ]);

        Documentos::factory()->create([
            'nombre' => 'EPS',
        ]);

        Documentos::factory()->create([
            'nombre' => 'Antecedentes Disciplinarios',
        ]);

        Documentos::factory()->create([
            'nombre' => 'Antecedentes Penales',
        ]);

        Documentos::factory()->create([
            'nombre' => 'Permiso Bancario',
        ]);

        Documentos::factory()->create([
            'nombre' => 'Examenes ocupacionales',
        ]);
    }
}
