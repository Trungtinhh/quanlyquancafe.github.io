<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Hash;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'system.permission.management']);
        Permission::create(['name' => 'system.configuration.management']);
        Permission::create(['name' => 'system.basic.management']);
        Permission::create(['name' => 'system.view.basic']);
        Permission::create(['name' => 'system.update']);
        Permission::create(['name' => 'system.create']);
        Permission::create(['name' => 'system.delete']);

        $role1 = Role::create(['name' => 'Admin']);
        $role1->givePermissionTo('system.permission.management');
        $role1->givePermissionTo('system.configuration.management');
        $role1->givePermissionTo('system.basic.management');
        $role1->givePermissionTo('system.view.basic');
        $role1->givePermissionTo('system.update');
        $role1->givePermissionTo('system.create');
        $role1->givePermissionTo('system.delete');

        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => '2021-12-07 17:27:41',
            'password' => Hash::make('123123123'),
            'status' => 1,

        ]);
        $user->assignRole($role1);
    }
}
