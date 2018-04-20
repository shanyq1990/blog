<?php

namespace App\Policies;

use App\AdminUser;
use App\User;
use App\Document;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentPolicy
{
    use HandlesAuthorization;


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
    public function admin_doc(AdminUser $adminUser)
    {
        return $adminUser->hasAnyPermission(['document create','document index','document edit','document delete']);

    }

    /*
     * show document index
     * */
    public function index(AdminUser $adminUser)
    {
        return $adminUser->hasPermissionTo('document index');

    }

    /**
     * Determine whether the user can create documents.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(AdminUser $user)
    {
        return $user->hasPermissionTo('document create');
    }

    /**
     * Determine whether the user can edit the document.
     *
     * @param  \App\User  $user
     * @param  \App\Document  $document
     * @return mixed
     */
    public function edit(AdminUser $user, Document $document)
    {
        return $document->author_id==$user->id;
    }

    /**
     * Determine whether the user can delete the document.
     *
     * @param  \App\User  $user
     * @param  \App\Document  $document
     * @return mixed
     */
    public function delete(AdminUser $user, Document $document)
    {
        return $document->author_id==$user->id;
    }
}
