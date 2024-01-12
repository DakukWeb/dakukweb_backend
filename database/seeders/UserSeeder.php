<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Dakuk Master',
            'email' => 'dakuk@admin.com',
            'phone' => fake()->phoneNumber(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('admin');

        User::factory(20)->create()->each(function ($user) {
            $user->assignRole('customer');
        });

        User::factory(20)->trashed()->create()->each(function ($user) {
            $user->assignRole('customer');
        });
    }
}
