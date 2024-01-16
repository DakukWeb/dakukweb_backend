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

        $product_index = Permission::create(['name' => 'products.index']);
        $product_store = Permission::create(['name' => 'products.store']);
        $product_show = Permission::create(['name' => 'products.show']);
        $product_update = Permission::create(['name' => 'products.update']);
        $product_destroy = Permission::create(['name' => 'products.destroy']);

        $admin_role = Role::create(['name'=>'admin']);
        $admin_role->givePermissionTo([
            $product_index,
            $product_store,
            $product_show,
            $product_update,
            $product_destroy
        ]);
        $user = User::create([
            'name' => 'Dakuk Master',
            'email' => 'dakuk@admin.com',
            'phone' => fake()->phoneNumber(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        $user->assignRole($admin_role); 

    }
}
