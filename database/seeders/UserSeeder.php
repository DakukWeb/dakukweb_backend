<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = User::factory(20)->create();
        $admin = User::create([
            'name' => 'Dakuk Master',
            'email' => 'dakuk@admin.com',
            'phone' => fake()->phoneNumber(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
        // Obtener los roles
        $customerRole = Role::where('name', 'customer')->first();
        $adminRole = Role::where('name', 'admin')->first();
        // Asignar roles a cada usuario
        foreach ($customers as $customer) {
            $customer->assignRole($customerRole);
        }
        $admin->assignRole($adminRole);
    }
}

