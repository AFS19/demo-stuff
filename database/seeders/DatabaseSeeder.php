<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Run the RolePermissionSeeder to create roles and permissions
        $this->call(RolePermissionSeeder::class);

        // Create an Admin user
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
        ]);

        // Assign the 'Admin' role to the user
        $admin->assignRole('Admin');

        $doctor = User::factory()->create([
            'name' => 'Doctor User',
            'email' => 'doctor@doctor.com',
            'password' => bcrypt('password'),
        ]);
        $doctor->assignRole('Doctor');

        $patient = User::factory()->create([
            'name' => 'Patient User',
            'email' => 'patient@patient.com',
            'password' => bcrypt('password'),
        ]);
        $patient->assignRole('Patient');

    }
}
