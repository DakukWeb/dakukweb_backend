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
        //permissions//
        $product_index = Permission::create(['name' => 'products.index']);
        $product_store = Permission::create(['name' => 'products.store']);
        $product_show = Permission::create(['name' => 'products.show']);
        $product_update = Permission::create(['name' => 'products.update']);
        $product_destroy = Permission::create(['name' => 'products.destroy']);

        //Roles//
        $admin_role = Role::create(['name'=>'admin']);
        $customer_role = Role::create(['name'=> 'customer']);

        //Admin//
        $admin_role->givePermissionTo([
            $product_index,
            $product_store,
            $product_show,
            $product_update,
            $product_destroy
        ]);
        $admin = User::create([
            'name' => 'Dakuk Master',
            'email' => 'dakuk@admin.com',
            'phone' => fake()->phoneNumber(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        $admin->assignRole($admin_role);
        $admin->givePermissionTo([
            $product_index,
            $product_store,
            $product_show,
            $product_update,
            $product_destroy
        ]);

        //Customer//
        $customer = User::create([
            'name' => 'customer lol',
            'email' => 'dakuk@customer.com',
            'phone' => fake()->phoneNumber(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        $customer->assignRole($customer_role);
        $customer->givePermissionTo([
            $product_index,
            $product_store,
            $product_show,
            $product_update,
            $product_destroy
        ]);

    }
}
