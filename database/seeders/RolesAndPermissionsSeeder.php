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
            ['name' => 'role_access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'role_create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'role_show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'role_edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'role_delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission_access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission_create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission_show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission_edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission_delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'profile_access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'profile_edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'profile_delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user_access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user_create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user_show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user_edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user_delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer_access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer_create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer_show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer_edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer_delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'supplier_access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'supplier_create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'supplier_show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'supplier_edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'supplier_delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'brand_access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'brand_create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'brand_show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'brand_edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'brand_delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category_access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category_create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category_show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category_edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category_delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-category_access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-category_create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-category_show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-category_edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sub-category_delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'product_access', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'product_create', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'product_show', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'product_edit', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'product_delete', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]
        ]);

        Role::insert([
            ['name' => 'super-admin', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'admin', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
