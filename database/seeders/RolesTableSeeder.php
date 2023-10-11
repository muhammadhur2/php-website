<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $roles = ['Software Developer', 'Project Manager', 'Business Analyst', 'Tester', 'Client Liaison'];

    foreach ($roles as $role) {
        Role::create(['name' => $role]);
    }
}

}
