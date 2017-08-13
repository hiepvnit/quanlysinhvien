<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('register',['as'=>'register.create','uses'=>'Auth\RegisterController@showRegistrationForm']);

Route::group(['middleware' => ['auth']], function() {

    Route::get('/', 'HomeController@index');

    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::group(['middleware' => ['role:admin']], function() {
        Route::resource('user','UserController');
    });

    Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['role:admin']]);
    Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['role:admin']]);
    Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['role:admin']]);
    Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show','middleware' => ['role:admin']]);
    Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['role:admin']]);
    Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['role:admin']]);
    Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['role:admin']]);

    Route::get('huyen',['as'=>'huyen.index','uses'=>'HuyenController@index','middleware' => ['role:admin|teacher']]);
    Route::get('huyen/add',['as'=>'huyen.add','uses'=>'HuyenController@showAddForm','middleware' => ['role:admin|teacher']]);
    Route::post('huyen/add',['as'=>'huyen.add','uses'=>'HuyenController@add','middleware' => ['role:admin|teacher']]);
    Route::get('huyen/delete/{id}',['as'=>'huyen.delete','uses'=>'HuyenController@delete','middleware' => ['role:admin|teacher']]);
    Route::get('huyen/edit/{id}',['as'=>'huyen.edt','uses'=>'HuyenController@edit','middleware' => ['role:admin|teacher']]);
    Route::post('huyen/update',['as'=>'huyen.update','uses'=>'HuyenController@update','middleware' => ['role:admin|teacher']]);

    Route::get('tinh',['as'=>'tinh.index','uses'=>'TinhController@index','middleware' => ['role:admin|teacher']]);
    Route::get('tinh/add',['as'=>'tinh.add','uses'=>'TinhController@showAddForm','middleware' => ['role:admin|teacher']]);
    Route::post('tinh/add',['as'=>'tinh.add','uses'=>'TinhController@add','middleware' => ['role:admin|teacher']]);
    Route::get('tinh/delete/{id}',['as'=>'tinh.delete','uses'=>'TinhController@delete','middleware' => ['role:admin|teacher']]);
    Route::get('tinh/edit/{id}',['as'=>'tinh.edit','uses'=>'TinhController@edit','middleware' => ['role:admin|teacher']]);
    Route::post('tinh/update',['as'=>'tinh.update','uses'=>'TinhController@update','middleware' => ['role:admin|teacher']]);

    Route::get('lop',['as'=>'lop.index','uses'=>'LopController@index','middleware' => ['role:admin|teacher']]);
    Route::get('lop/add',['as'=>'lop.add','uses'=>'LopController@showAddForm','middleware' => ['role:admin|teacher']]);
    Route::post('lop/add',['as'=>'lop.add','uses'=>'LopController@add','middleware' => ['role:admin|teacher']]);
    Route::get('lop/delete/{id}',['as'=>'lop.delete','uses'=>'LopController@delete','middleware' => ['role:admin|teacher']]);
    Route::get('lop/edit/{id}',['as'=>'lop.edit','uses'=>'LopController@edit','middleware' => ['role:admin|teacher']]);
    Route::post('lop/update',['as'=>'lop.update','uses'=>'LopController@update','middleware' => ['role:admin|teacher']]);

    Route::get('congty',['as'=>'congty.index','uses'=>'CongTyController@index','middleware' => ['role:admin']]);
    Route::get('congty/add',['as'=>'congty.add','uses'=>'CongTyController@showAddForm','middleware' => ['role:admin']]);
    Route::post('congty/add',['as'=>'congty.add','uses'=>'CongTyController@add','middleware' => ['role:admin']]);
    Route::get('congty/delete/{id}',['as'=>'congty.delete','uses'=>'CongTyController@delete','middleware' => ['role:admin']]);
    Route::get('congty/edit/{id}',['as'=>'congty.edit','uses'=>'CongTyController@edit','middleware' => ['role:admin']]);
    Route::post('congty/update',['as'=>'congty.update','uses'=>'CongTyController@update','middleware' => ['role:admin']]);

    Route::get('khoahoc',['as'=>'khoahoc.index','uses'=>'KhoaHocController@index','middleware' => ['role:admin|teacher']]);
    Route::get('khoahoc/add',['as'=>'khoahoc.add','uses'=>'KhoaHocController@showAddForm','middleware' => ['role:admin|teacher']]);
    Route::post('khoahoc/add',['as'=>'khoahoc.add','uses'=>'KhoaHocController@add','middleware' => ['role:admin|teacher']]);
    Route::get('khoahoc/delete/{id}',['as'=>'khoahoc.delete','uses'=>'KhoaHocController@delete','middleware' => ['role:admin|teacher']]);
    Route::get('khoahoc/edit/{id}',['as'=>'khoahoc.edit','uses'=>'KhoaHocController@edit','middleware' => ['role:admin|teacher']]);
    Route::post('khoahoc/update',['as'=>'khoahoc.update','uses'=>'KhoaHocController@update','middleware' => ['role:admin|teacher']]);

    Route::get('hocvien',['as'=>'hocvien.index','uses'=>'HocVienController@index','middleware' => ['role:admin|teacher']]);
    Route::get('hocvien/add',['as'=>'hocvien.add','uses'=>'HocVienController@showAddForm','middleware' => ['role:admin|teacher']]);
    Route::get('hocvien/detail/{id}',['as'=>'hocvien.detail','uses'=>'HocVienController@detail']);
    Route::post('hocvien/add',['as'=>'hocvien.add','uses'=>'HocVienController@add','middleware' => ['role:admin|teacher']]);
    Route::get('hocvien/delete/{id}',['as'=>'hocvien.delete','uses'=>'HocVienController@delete','middleware' => ['role:admin|teacher']]);
    Route::get('hocvien/edit/{id}', 'HocVienController@edit');
    Route::post('hocvien/update',['as'=>'hocvien.update','uses'=>'HocVienController@update']);
});