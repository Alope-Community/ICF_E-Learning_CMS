<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $teacherRole = Role::firstOrCreate(['name' => 'teacher']);
        $studentRole = Role::firstOrCreate(['name' => 'student']);

        $manageAll = Permission::firstOrCreate(['name' => 'manage all']);
        $manageClass = Permission::firstOrCreate(['name' => 'manage class']);

        $user = \App\Models\User::where('name', 'mrfatra')->first();

        if ($user) {
            $user->assignRole('admin');
        }

        $adminRole->givePermissionTo($manageAll);
        $teacherRole->givePermissionTo($manageClass);
    }
}
