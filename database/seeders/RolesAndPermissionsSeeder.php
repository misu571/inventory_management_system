<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::insert([
            ['name' => 'role access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'role create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'role show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'role edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'role update', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'role delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission update', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'assign role', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'revoke role', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'assign permission', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'revoke permission', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user store', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user update', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user destroy', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer store', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer update', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer destroy', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'supplier access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'supplier create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'supplier store', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'supplier show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'supplier edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'supplier update', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'supplier delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'supplier destroy', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'department access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'department create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'department store', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'department show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'department edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'department update', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'department delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'department destroy', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'brand access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'brand create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'brand store', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'brand show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'brand edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'brand update', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'brand delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'brand destroy', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category store', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category update', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category destroy', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-category access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-category create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-category store', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-category show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-category edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-category update', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-category delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-category destroy', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-group access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-group create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-group store', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-group show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-group edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-group update', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-group delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-group destroy', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'product access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'product create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'product store', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'product show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'product edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'product update', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'product delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'product destroy', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]
        ]);

        Role::create(['name' => 'super-admin'])->givePermissionTo(Permission::all());
        Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());
        Role::create(['name' => 'manager']);
    }
}
