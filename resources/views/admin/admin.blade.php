@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="col-md-3">
            <ul class="left-nav">
                <li><span>Statics</span>

                </li>


                <li><span>User</span>
                    <ul class="left-nav-item">
                        <li><a href="{{url('admin/user/index')}}">UserList</a></li>
                    </ul>

                </li>

                @if(Auth::guard('admin')->user()->can('admin_admin_user',\App\AdminUser::class))

                    <li><span>AdminUser</span>
                        <ul class="left-nav-item">
                            @if(Auth::guard('admin')->user()->hasPermissionTo('admin_user index'))
                                <li><a href="{{url('admin/admin_user/index')}}">UserList</a></li>
                            @endif
                            @if(Auth::guard('admin')->user()->hasPermissionTo('admin_user create'))
                                <li><a href="{{url('admin/admin_user/create')}}">UserCreate</a></li>
                            @endif
                            @if(Auth::guard('admin')->user()->hasPermissionTo('admin_role index'))
                                <li><a href="{{url('admin/admin_user/rolelist')}}">RoleList</a></li>
                            @endif
                            @if(Auth::guard('admin')->user()->hasPermissionTo('admin_role create'))
                                <li><a href="{{url('admin/admin_user/createrole')}}">CreateRole</a></li>
                            @endif

                        </ul>

                    </li>
                @endif


                @if(Auth::guard('admin')->user()->can('admin_documentcate',\App\Documentcate::class))


                    <li><span>Documentcate</span>
                        <ul class="left-nav-item">
                            @if(Auth::guard('admin')->user()->hasPermissionTo('documentcate index'))
                                <li><a href="{{url('admin/documentcate/index')}}">List</a></li>
                            @endif
                            @if(Auth::guard('admin')->user()->hasPermissionTo('documentcate create'))
                                <li><a href="{{url('admin/documentcate/create')}}">Create</a></li>
                            @endif

                        </ul>
                    </li>

                @endif
                @if(Auth::guard('admin')->user()->can('admin_doc',\App\Document::class))
                    <li><span>Document</span>
                        <ul class="left-nav-item">

                            @if(Auth::guard('admin')->user()->can('index',\App\Document::class))
                                <li><a href="{{url('admin/document/index')}}">List</a></li>
                            @endif

                            @if(Auth::guard('admin')->user()->can('create',\App\Document::class))
                                <li><a href="{{url('admin/document/create')}}">Create</a></li>
                            @endif

                        </ul>

                    </li>
                @endif
            </ul>
        </div>


        <div class="col-md-9">
            @yield('right-side')
        </div>
    </div>
@append