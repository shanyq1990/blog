<?php

namespace App\Http\Controllers\Admin;

use App\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    /*
     * show admin user list
     * */
    public function index()
    {
        $admin_users=AdminUser::all();

        return view('admin.admin_user.index')->with(compact('admin_users'));
        
    }
    /*
     * show create admin user form
     * */
    public function createUser()
    {
        return view('admin.admin_user.createUser');

    }
    /*
     * process create user
     * */
    public function processCreateUser(Request $request)
    {

        $validator=Validator::make($request->all(),[
            'name'=>'required|unique:admin_users,name',
            'email'=>'required|unique:admin_users,email',
            'password'=>'required|min:6'
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator);
        }

        /*
         * create new admin user
         * */

        $this->createAdminUser($request->only('name','email','password'));

        return redirect()->to('admin/admin_user/index');


    }

    /*
     * delete user
     * */
    public function delete($id)
    {
        AdminUser::find($id)->delete();

        return redirect()->to('admin/admin_user/index');

    }

    /*
     * set user permissions
     * */
    public function userPermissions($id)
    {
        $admin_user=AdminUser::find($id);
        $permissions=Permission::all();

        /*
         * get directPermission name
         * */
        $directPermissions=$admin_user->getDirectPermissions();
        $directPermissionsName=[];
        foreach ($directPermissions as $directPermission){
            $directPermissionsName[]=$directPermission->name;
        }

        $directPermissionsName=array_flip($directPermissionsName);

        /*
         * get permissions via role
         * */
        $roleNames=$admin_user->getRoleNames();
        $viaRolePermissionsName=[];
        foreach ($roleNames as $roleName){

            foreach(Role::findByName($roleName,'admin')->permissions as $permission){
                $viaRolePermissionsName[$permission->name]=$roleName;
            }

        }


        return view('admin.admin_user.permissions')->with(compact('admin_user','permissions','directPermissionsName','viaRolePermissionsName'));
    }


    /*
     * alter admin_user permission
     * */
    public function alterAdminUserPermission(Request $request)
    {
        $admin_user=AdminUser::find($request->input('admin_user_id'));
        $permission=Permission::find($request->input('permission_id'));

        if(!$admin_user or !$permission){
            return 'alter fail!';
        }

        if($admin_user->hasPermissionTo($permission)){
            $admin_user->revokePermissionTo($permission);
        }else{
            $admin_user->givePermissionTo($permission);
        }

        return 'alter success';

    }

    /*
     * show create role form
     * */
    public function createRole()
    {
        return view('admin.admin_user.createrole');
    }

    /*
     * process create role
     * */
    public function processCreateRole(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|unique:roles,name',
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator);
        }


        /*
         * create role
         * */

        $this->createAdminRole($request->input('name'));

        return redirect()->to('admin/admin_user/rolelist');


    }


    /*
     * role list
     * */
    public function roleList()
    {
        $roles=Role::all();
        return view('admin/admin_user/rolelist')->with(compact('roles'));

    }

    /*
     * user role
     * */
    public function userRole($id)
    {
        $admin_user=AdminUser::find($id);
        $roles=Role::all();

        return view('admin.admin_user.userrole')->with(compact('admin_user','roles'));

    }
    /*
     * alter admin user role
     * */
    public function alterAdminUserRole(Request $request)
    {
        $admin_user=AdminUser::find($request->input('admin_user_id'));
        $role=Role::findByName($request->input('role_name'),'admin');


        if(!$admin_user or !$role){
            return 'alter fail!';
        }

        if($admin_user->hasRole($role)){
            $admin_user->removeRole($role);
        }else{
            $admin_user->assignRole($role);
        }

        return 'alter success!';

    }

    /*
     * delete admin_user role
     * */
    public function deleteRole($id)
    {
        Role::find($id)->delete();

        return redirect()->to('admin/admin_user/rolelist');
    }
    
    /*
     * role permissions 
     * */
    public function rolePermissions($id)
    {

        $role=Role::find($id);
        $permissions=Permission::all();

        return view('admin.admin_user.rolepermissions')->with(compact('role','permissions'));
    }

    /*
     * alter admin_user permission
     * */
    public function alterAdminRolePermission(Request $request)
    {
        $role=Role::find($request->input('role_id'));
        $permission=Permission::find($request->input('permission_id'));

        if(!$role or !$permission){
            return 'alter fail!';
        }

        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
        }else{
            $role->givePermissionTo($permission);
        }

        return 'alter success';

    }
    
    /*
     * role users
     * */
    public function roleUsers($id)
    {
        $role=Role::find($id);
        $users=AdminUser::role($role)->get();

        return view('admin.admin_user.roleusers')->with(compact('role','users'));
        
    }




    /*
     * create admin role
     * */
    private function createAdminRole($name)
    {
        Role::create(['guard_name'=>'admin','name'=>$name]);

    }


    /*
     * create admin user
     * */

    private function createAdminUser($crendital)
    {

        $admin_user=new AdminUser();
        $admin_user->name=$crendital['name'];
        $admin_user->email=$crendital['email'];
        $admin_user->password=bcrypt($crendital['password']);
        $admin_user->save();

    }
}
