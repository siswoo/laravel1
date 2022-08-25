<?php

namespace Database\Seeders;

use App\Models\UsersRoles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UsersRoles::factory()->create([
            'id_users' => 1,
            'id_roles' => 1,
        ]);
    }
}
