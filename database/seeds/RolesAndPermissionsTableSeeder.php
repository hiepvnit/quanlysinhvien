<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name  = 'admin';
        $admin->display_name  = 'Quản lý';
        $admin->save();

        $roleList = new Permission();
        $roleList->name = 'role-list';
        $roleList->display_name = 'Danh sách nhóm tài khoản';
        $roleList->save();

        $roleCreate = new Permission();
        $roleCreate->name = 'role-create';
        $roleCreate->display_name = 'Tạo mới nhóm tài khoản';
        $roleCreate->save();

        $roleEdit = new Permission();
        $roleEdit->name = 'role-edit';
        $roleEdit->display_name = 'Sửa nhóm tài khoản';
        $roleEdit->save();

        $roleDelete = new Permission();
        $roleDelete->name = 'role-delete';
        $roleDelete->display_name = 'Xóa nhóm tài khoản';
        $roleDelete->save();

        $admin->attachPermission($roleList);
        $admin->attachPermission($roleCreate);
        $admin->attachPermission($roleEdit);
        $admin->attachPermission($roleDelete);

        $user = User::where('username', '=', 'admin')->first();
        // role attach alias
        $user->attachRole($admin); // parameter can be an Role object, array, or id
    }
}
