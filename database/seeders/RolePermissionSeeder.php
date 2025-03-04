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
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Permissions
        Permission::create(['name' => 'view-dashboard']);
        Permission::create(['name' => 'manage-users']);
        Permission::create(['name' => 'view-patient-records']);
        Permission::create(['name' => 'edit-patient-records']);
        Permission::create(['name' => 'delete-patient-records']);

        // Create Roles and Assign Permissions
        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->givePermissionTo(['view-dashboard', 'manage-users']);

        $doctorRole = Role::create(['name' => 'Doctor']);
        $doctorRole->givePermissionTo(['view-patient-records', 'edit-patient-records']);

        $patientRole = Role::create(['name' => 'Patient']);
        $patientRole->givePermissionTo('view-patient-records');
    }
}
