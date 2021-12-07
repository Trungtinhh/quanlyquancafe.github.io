<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Database\Factories\UserFactory;
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
}
}


