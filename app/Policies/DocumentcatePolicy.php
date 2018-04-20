<?php

namespace App\Policies;

use App\AdminUser;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentcatePolicy
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
        if($adminUser->hasRole('administrator')){
            return true;
        }

    }


    /*
     * document
     * */

    public function admin_documentcate(AdminUser $adminUser)
    {
        return $adminUser->hasAnyPermission(['documentcate create','documentcate index','documentcate edit','documentcate delete']);

    }


}
