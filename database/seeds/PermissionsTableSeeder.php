<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'name' => 'hocvien-list',
                'display_name' => 'Hiển thị list học viên',
                'description' => 'Hiển thị list học viên'
            ],
            [
                'name' => 'hocvien-create',
                'display_name' => 'Tạo mới học viên',
                'description' => 'Tạo mới học viên'
            ],
            [
                'name' => 'hocvien-edit',
                'display_name' => 'Sửa học viên',
                'description' => 'Sửa học viên'
            ],
            [
                'name' => 'hocvien-delete',
                'display_name' => 'Xóa học viên',
                'description' => 'Xóa học viên'
            ],
            [
                'name' => 'lop-list',
                'display_name' => 'Danh sách lớp',
                'description' => 'Danh sách lớp'
            ],
            [
                'name' => 'lop-create',
                'display_name' => 'Tạo mới lớp',
                'description' => 'Tạo mới lớp'
            ],
            [
                'name' => 'lop-edit',
                'display_name' => 'Sửa lớp',
                'description' => 'Sửa lớp'
            ],
            [
                'name' => 'lop-delete',
                'display_name' => 'Xóa lớp',
                'description' => 'Xóa lớp'
            ],
            [
                'name' => 'huyen-list',
                'display_name' => 'Danh sách huyện',
                'description' => 'Danh sách huyện'
            ],
            [
                'name' => 'huyen-create',
                'display_name' => 'Tạo mới huyện',
                'description' => 'Tạo mới huyện'
            ],
            [
                'name' => 'huyen-edit',
                'display_name' => 'Sửa huyện',
                'description' => 'Sửa huyện'
            ],
            [
                'name' => 'huyen-delete',
                'display_name' => 'Xóa huyện',
                'description' => 'Xóa huyện'
            ],
            [
                'name' => 'tinh-list',
                'display_name' => 'Danh sách tỉnh',
                'description' => 'Danh sách tỉnh'
            ],
            [
                'name' => 'tinh-create',
                'display_name' => 'Tạo mới tỉnh',
                'description' => 'Tạo mới tỉnh'
            ],
            [
                'name' => 'tinh-edit',
                'display_name' => 'Sửa tỉnh',
                'description' => 'Sửa tỉnh'
            ],
            [
                'name' => 'tinh-delete',
                'display_name' => 'Xóa tỉnh',
                'description' => 'Xóa tỉnh'
            ],
            [
                'name' => 'khoahoc-list',
                'display_name' => 'Danh sách khóa học',
                'description' => 'Danh sách khóa học'
            ],
            [
                'name' => 'khoahoc-create',
                'display_name' => 'Tạo mới khóa học',
                'description' => 'Tạo mới khóa học'
            ],
            [
                'name' => 'khoahoc-edit',
                'display_name' => 'Sửa khóa học',
                'description' => 'Sửa khóa học'
            ],
            [
                'name' => 'khoahoc-delete',
                'display_name' => 'Xóa khóa học',
                'description' => 'Xóa khóa học'
            ]
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
