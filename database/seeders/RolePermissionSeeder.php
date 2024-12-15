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

        $adminUser = \App\Models\User::where('name', 'im admin')->first();
        $teacherUser = \App\Models\User::where('name', 'im teacher')->first();
        $teacherUser2 = \App\Models\User::where('name', 'im teacher 2')->first();
        $studentUser = \App\Models\User::where('name', 'im student')->first();
        $studentUser2 = \App\Models\User::where('name', 'im student 2')->first();
        
        $teacherUnverified = \App\Models\User::where('name', 'teacher unverified')->first();

        $adminUser->assignRole('admin');
        $teacherUser->assignRole('teacher');
        $teacherUser2->assignRole('teacher');
        $studentUser->assignRole('student');
        $studentUser2->assignRole('student');

        $teacherUnverified->assignRole('teacher');

        $adminRole->givePermissionTo($manageAll);
        $teacherRole->givePermissionTo($manageClass);
    }
}
