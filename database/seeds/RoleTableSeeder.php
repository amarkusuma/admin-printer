<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Manager',
            'Karyawan',
            'User',

        ];


        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
