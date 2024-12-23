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
        permission::create(['name'=>'tambah-user']);
        permission::create(['name'=>'edit-user']);
        permission::create(['name'=>'hapus-user']);
        permission::create(['name'=>'lihat-user']);

        permission::create(['name'=>'tambah-unit']);
        permission::create(['name'=>'edit-unit']);
        permission::create(['name'=>'hapus-unit']);
        permission::create(['name'=>'lihat-unit']);

        Role::create(['name'=>'admin']);
        Role::create(['name'=>'pelanggan']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin -> givePermissionTo('tambah-user');
        $roleAdmin -> givePermissionTo('edit-user');
        $roleAdmin -> givePermissionTo('hapus-user');
        $roleAdmin -> givePermissionTo('lihat-user');

        $rolePelanggan= Role::findByName('pelanggan');
        $rolePelanggan -> givePermissionTo('tambah-user');
        $rolePelanggan -> givePermissionTo('edit-user');
        $rolePelanggan -> givePermissionTo('hapus-user');
        $rolePelanggan -> givePermissionTo('lihat-user');

    }
}
