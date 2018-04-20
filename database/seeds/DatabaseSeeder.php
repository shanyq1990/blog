<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        /*
         * add super admin user
         * */
        $this->addRolesAndAdmin();


        /*
         * permissions
         * */

        $this->addAdminUserPermissions();

    }



    /*
     * add super admin user
     * */
    private function addRolesAndAdmin()
    {
        //flush the cache

        app()['cache']->forget('spatie.permission.cache');


        foreach (config('note.roles') as $role){
            Role::create(['guard_name'=>'admin','name'=>$role]);
        }

        /*
         * add super admin
         * */

        $super=new \App\AdminUser();
        $super->name='administrator';
        $super->password=bcrypt('000000');
        $super->email='shanyq1990@163.com';
        $super->save();

//        assign role
        $super->assignRole('administrator');
    }

    /*
     * admin user permissions
     * */
    private function addAdminUserPermissions()
    {

        //flush the cache

        app()['cache']->forget('spatie.permission.cache');

        $administrator=Role::where('name','administrator')->first();

        foreach (config('note.permissions') as $permision){

            $administrator->givePermissionTo(Permission::create(['guard_name'=>'admin','name'=>$permision]));

        }

    }
}
