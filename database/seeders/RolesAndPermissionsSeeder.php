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
            ['name' => 'role delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'profile access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'profile edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'profile delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'supplier access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'supplier create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'supplier show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'supplier edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'supplier delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'brand access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'brand create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'brand show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'brand edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'brand delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-category access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-category create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-category show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-category edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-category delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'product access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'product create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'product show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'product edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'product delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]
        ]);

        Role::insert([
            ['name' => 'super-admin', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'admin', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
