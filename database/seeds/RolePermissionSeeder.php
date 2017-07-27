<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role = new Role();
      $role->name         = 'administrator';
      $role->display_name = 'Administrator';
      $role->description  = 'Vai trò Administrator';
      $role->save();

      $role = new Role();
      $role->name         = 'designer';
      $role->display_name = 'designer';
      $role->description  = 'Vai trò designer';
      $role->save();

      $role = new Role();
      $role->name         = 'printer';
      $role->display_name = 'Printer';
      $role->description  = 'Vai trò printer';
      $role->save();

      $permission = new Permission();
      $permission->name         = 'hoadon';
      $permission->display_name = 'Quản lý hóa đơn';
      $permission->description  = 'Nhân viên có quyền quản lý';
      $permission->save();

      $permission = new Permission();
      $permission->name         = 'donhang';
      $permission->display_name = 'Quản lý đơn hàng';
      $permission->description  = 'Nhân viên có quyền quản lí đơn hàng';
      $permission->save();


      $permission = new Permission();
      $permission->name         = 'taikhoan';
      $permission->display_name = 'Quản lí tài khoản';
      $permission->description  = 'Nhân viên có quyền quản lí tài khoản';
      $permission->save();

    }
}
