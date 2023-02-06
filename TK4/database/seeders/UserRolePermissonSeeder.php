<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserRolePermissonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin =  User::create([
            'name' => 'admin',
            'email' => 'admin@binus.ol',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        
        $staff =  User::create([
            'name' => 'staff',
            'email' => 'staff@binus.ol',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $pembeli =  User::create([
            'name' => 'pembeli',
            'email' => 'pembeli@binus.ol',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        // permission for staff
        $permission = Permission::create(['name' => 'create pembeli']);
        $permission = Permission::create(['name' => 'read pembeli']);
        $permission = Permission::create(['name' => 'update pembeli']);
        $permission = Permission::create(['name' => 'delete pembeli']);

        // permission for administrator
        $permission = Permission::create(['name' => 'create user']);
        $permission = Permission::create(['name' => 'read user']);
        $permission = Permission::create(['name' => 'update user']);
        $permission = Permission::create(['name' => 'delete user']);

        // General Permission
        $permission = Permission::create(['name' => 'approval pembelian barang']);
        $permission = Permission::create(['name' => 'ganti password']);
        $permission = Permission::create(['name' => 'edit profile']);
        $permission = Permission::create(['name' => 'beli barang']);
        
        $role_admin = Role::create(['name' => 'admin']);
        $role_admin->givePermissionTo('create user');
        $role_admin->givePermissionTo('read user');
        $role_admin->givePermissionTo('update user');
        $role_admin->givePermissionTo('delete user');
        $role_admin->givePermissionTo('create pembeli');
        $role_admin->givePermissionTo('read pembeli');
        $role_admin->givePermissionTo('update pembeli');
        $role_admin->givePermissionTo('delete pembeli');
        $role_admin->givePermissionTo('approval pembelian barang');
        $role_admin->givePermissionTo('ganti password');
        $role_admin->givePermissionTo('edit profile');
        $role_admin->givePermissionTo('beli barang');

        $role_staff = Role::create(['name' => 'staff']);
        $role_staff->givePermissionTo('create pembeli');
        $role_staff->givePermissionTo('read pembeli');
        $role_staff->givePermissionTo('update pembeli');
        $role_staff->givePermissionTo('delete pembeli');

        $role_pembeli = Role::create(['name' => 'pembeli']);
        $role_pembeli->givePermissionTo('approval pembelian barang');
        $role_pembeli->givePermissionTo('ganti password');
        $role_pembeli->givePermissionTo('edit profile');
        $role_pembeli->givePermissionTo('beli barang');

        $admin->assignRole('admin');
        $staff->assignRole('staff');
        $pembeli->assignRole('pembeli');
    }
}
