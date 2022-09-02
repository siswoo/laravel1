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

        UsersRoles::factory()->create([
            'id_users' => 1,
            'id_roles' => 2,
        ]);
        
        /*
        UsersRoles::factory()->create([
            'id_users' => 1,
            'id_roles' => 3,
        ]);

        UsersRoles::factory()->create([
            'id_users' => 1,
            'id_roles' => 4,
        ]);

        UsersRoles::factory()->create([
            'id_users' => 1,
            'id_roles' => 5,
        ]);

        UsersRoles::factory()->create([
            'id_users' => 1,
            'id_roles' => 6,
        ]);

        UsersRoles::factory()->create([
            'id_users' => 1,
            'id_roles' => 7,
        ]);

        UsersRoles::factory()->create([
            'id_users' => 1,
            'id_roles' => 8,
        ]);

        UsersRoles::factory()->create([
            'id_users' => 1,
            'id_roles' => 9,
        ]);
        */
        UsersRoles::factory()->create([
            'id_users' => 1,
            'id_roles' => 10,
        ]);

        UsersRoles::factory()->create([
            'id_users' => 1,
            'id_roles' => 11,
        ]);
    }
}
