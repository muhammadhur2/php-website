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
    $roles = ['software developer', 'project manager', 'business analyst', 'tester', 'client liaison'];

    foreach ($roles as $role) {
        Role::create(['name' => $role]);
    }
}

}
