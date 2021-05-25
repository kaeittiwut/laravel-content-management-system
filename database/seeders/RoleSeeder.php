<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->delete();

        $user_roles = [
            [
                'name' => 'Super Admin',
                'slug' => 'super-admin',
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin',
            ],
            [
                'name' => 'Editor',
                'slug' => 'editor',
            ],
            [
                'name' => 'Viewer',
                'slug' => 'viewer',
            ],
        ];

        Role::insert($user_roles);
    }
}
