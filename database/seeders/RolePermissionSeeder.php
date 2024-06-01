<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //membuat permission untuk crud user by super admin
        Permission::create(['name'=>'create-user']);
        Permission::create(['name'=>'read-user']);
        Permission::create(['name'=>'update-user']);
        Permission::create(['name'=>'delete-user']);

        Permission::create(['name'=>'view-finance-menu']);
        Permission::create(['name'=>'view-event-menu']);
        Permission::create(['name'=>'view-finance-data']);
        Permission::create(['name'=>'view-event-data']);
        // Permission::create(['name'=>'view-user']);

        //membuat semua role
        Role::create(['name'=>'super-admin']);
        Role::create(['name'=>'admin-finance']);
        Role::create(['name'=>'admin-event']);
        Role::create(['name'=>'manager']);
        Role::create(['name'=>'user']);

        //super admin diberikan izin untuk melakukan crud user
        $roleSuperAdmin = Role::findByName('super-admin');
        $roleSuperAdmin -> givePermissionTo(['create-user', 'read-user', 'update-user', 'delete-user']);

        //admin finance diberikan izin untuk melihat dashboard dan menu admin
        $roleAdminFinance = Role::findByName('admin-finance');
        // $roleAdminFinance -> givePermissionTo('view-dashboard');
        $roleAdminFinance -> givePermissionTo('view-finance-menu');

        //admin event diberikan izin untuk melihat dashboard dan menu admin
        $roleAdminEvent = Role::findByName('admin-event');
        // $roleAdminEvent -> givePermissionTo('view-dashboard');
        $roleAdminEvent -> givePermissionTo('view-event-menu');

        //manager diberikan izin untuk melihat dashboard data event, dan data finance
        $roleManager = Role::findByName('manager');
        // $roleManager -> givePermissionTo('view-dashboard');
        $roleManager -> givePermissionTo('view-event-data');
        $roleManager -> givePermissionTo('view-finance-data');
    }
}
