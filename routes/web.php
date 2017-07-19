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

Route::get('/', 'HocVienController@index');

Route::get('huyen', 'HuyenController@index')->name('huyen_index');
Route::get('huyen/add', 'HuyenController@showAddForm')->name('huyen_add');
Route::post('huyen/add', 'HuyenController@add')->name('huyen_add');
Route::get('huyen/delete/{id}', 'HuyenController@delete');
Route::get('huyen/edit/{id}', 'HuyenController@edit');
Route::post('huyen/update', 'HuyenController@update')->name('huyen_update');

Route::get('tinh', 'TinhController@index')->name('tinh_index');
Route::get('tinh/add', 'TinhController@showAddForm')->name('tinh_add');
Route::post('tinh/add', 'TinhController@add')->name('tinh_add');
Route::get('tinh/delete/{id}', 'TinhController@delete');
Route::get('tinh/edit/{id}', 'TinhController@edit');
Route::post('tinh/update', 'TinhController@update')->name('tinh_update');

Route::get('lop', 'LopController@index')->name('lop_index');
Route::get('lop/add', 'LopController@showAddForm')->name('lop_add');
Route::post('lop/add', 'LopController@add')->name('lop_add');
Route::get('lop/delete/{id}', 'LopController@delete');
Route::get('lop/edit/{id}', 'LopController@edit');
Route::post('lop/update', 'LopController@update')->name('lop_update');

Route::get('congty', 'CongTyController@index')->name('congty_index');
Route::get('congty/add', 'CongTyController@showAddForm')->name('congty_add');
Route::post('congty/add', 'CongTyController@add')->name('congty_add');
Route::get('congty/delete/{id}', 'CongTyController@delete');
Route::get('congty/edit/{id}', 'CongTyController@edit');
Route::post('congty/update', 'CongTyController@update')->name('congty_update');

Route::get('khoahoc', 'KhoaHocController@index')->name('khoahoc_index');
Route::get('khoahoc/add', 'KhoaHocController@showAddForm')->name('khoahoc_add');
Route::post('khoahoc/add', 'KhoaHocController@add')->name('khoahoc_add');
Route::get('khoahoc/delete/{id}', 'KhoaHocController@delete');
Route::get('khoahoc/edit/{id}', 'KhoaHocController@edit');
Route::post('khoahoc/update', 'KhoaHocController@update')->name('khoahoc_update');

Route::get('hocvien', 'HocVienController@index')->name('hocvien_index');
Route::get('hocvien/add', 'HocVienController@showAddForm')->name('hocvien_add');
Route::post('hocvien/add', 'HocVienController@add')->name('hocvien_add');
Route::get('hocvien/delete/{id}', 'HocVienController@delete');
Route::get('hocvien/edit/{id}', 'HocVienController@edit');
Route::post('hocvien/update', 'HocVienController@update')->name('hocvien_update');
