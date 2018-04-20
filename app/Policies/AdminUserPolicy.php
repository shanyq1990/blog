<?php

namespace App\Policies;

use App\AdminUser;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminUserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /*
     * super admin
     * */
    public function before(AdminUser $adminUser)
    {
        if ($adminUser->hasRole('adminstrator')){
            return true;
        }

    }

    /*
     * admin admin_user
     * */
    public function admin_admin_user(AdminUser $adminUser)
    {

        return $adminUser->hasAnyPermission(['admin_user index','admin_user create','admin_role index','admin_role create']);

    }


}
