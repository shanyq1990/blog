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

Route::get('/', function () {
    return view('index');
});


Route::group(['prefix'=>'home','namespace'=>'home'],function(){


    Route::get('','DocumentController@index');

    Route::get('document/detail/{id}','DocumentController@detail');

   /* Route::get('',function(){
        return view('home.info')->with(['message'=>'home']);
    });*/

    Route::group(['prefix'=>'auth'],function(){
        Route::get('register','AuthController@register');
        Route::post('register','AuthController@processRegister');
        Route::get('activate/{code}','AuthController@activate');

        Route::get('login','AuthController@login');
        Route::post('login','AuthController@processLogin');

        Route::get('logout','AuthController@logout');

    });

});


Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){




    Route::group(['prefix'=>'auth'],function(){
        Route::get('login','AuthController@login');
        Route::post('login','AuthController@processLogin');
        Route::get('logout','AuthController@logout');
    });

    Route::group(['middleware'=>['admin']],function(){

        Route::get('',function(){
            return view('admin.admin');
        });

        Route::group(['prefix'=>'user'],function(){
            Route::get('index','UserController@index');
            Route::get('delete/{id}','UserController@delete');
        });

        Route::group(['prefix'=>'admin_user'],function(){

            Route::get('index','AdminUserController@index');
            Route::get('create','AdminUserController@createUser');
            Route::post('create','AdminUserController@processCreateUser');
            Route::get('delete/{id}','AdminUserController@delete');
            Route::get('userpermissions/{id}','AdminUserController@userPermissions');
            Route::post('alterAdminUserPermission','AdminUserController@alterAdminUserPermission');

            Route::get('createrole','AdminUserController@createRole');
            Route::post('createrole','AdminUserController@processCreateRole');
            Route::get('rolelist','AdminUserController@roleList');
            Route::get('userrole/{id}','AdminUserController@userRole');
            Route::post('alterAdminUserRole','AdminUserController@alterAdminUserRole');
            Route::get('deleterole/{id}','AdminUserController@deleteRole');
            Route::get('rolepermissions/{id}','AdminUserController@rolePermissions');
            Route::get('roleusers/{id}','AdminUserController@roleUsers');
            Route::post('alterAdminRolePermission','AdminUserController@alterAdminRolePermission');

            Route::get('permissionlist','AdminUserController@permissionList');
        });

        Route::group(['prefix'=>'documentcate'],function(){

            Route::get('index','DocumentcateController@index');

            Route::get('create','DocumentcateController@create');
            Route::post('create','DocumentcateController@processCreate');


            Route::get('edit/{id}','DocumentcateController@edit');
            Route::post('edit/{id}','DocumentcateController@processEdit');

            Route::get('delete/{id}','DocumentcateController@delete');


        });


        Route::group(['prefix'=>'document'],function(){
            Route::get('index','DocumentController@index');
            Route::get('create','DocumentController@create');
            Route::post('create','DocumentController@processCreate');

            Route::get('delete/{id}','DocumentController@delete');
            Route::get('edit/{id}','DocumentController@edit');
            Route::post('edit/{id}','DocumentController@processEdit');
        });



    });


});
