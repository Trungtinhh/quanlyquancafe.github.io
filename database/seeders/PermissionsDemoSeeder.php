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
Permission::create(['name' => 'system.configuration.management']);
Permission::create(['name' => 'system.permission.management']);
Permission::create(['name' => 'system.view.basic']);
Permission::create(['name' => 'system.update']);
Permission::create(['name' => 'system.create']);
Permission::create(['name' => 'system.delete']);


// create roles and assign existing permissions
$role1 = Role::create(['name' => 'Quản trị']);
$role1->givePermissionTo('system.configuration.management');
$role1->givePermissionTo('system.permission.management');

$role2 = Role::create(['name' => 'Quản lý']);
$role2->givePermissionTo('system.permission.management');

$role3 = Role::create(['name' => 'Thu ngân']);
$role3->givePermissionTo('system.view.basic');
$role3->givePermissionTo('system.update');
$role3->givePermissionTo('system.create');
$role3->givePermissionTo('system.delete');

$role4 = Role::create(['name' => 'Nhân viên']);
$role4->givePermissionTo('system.view.basic');
$role4->givePermissionTo('system.create');

// gets all permissions via Gate::before rule; see AuthServiceProvider


}
}


