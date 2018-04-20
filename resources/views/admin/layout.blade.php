@extends('base')
@section('nav')
    <div class="navbar navbar-default">
        <div class="container">

            <div class="navbar-header">
                <div class="navbar-brand">
                    Backend
                </div>

                <button class="navbar-toggle" data-toggle="collapse" data-target="#navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


            </div>

            <div class="collapse navbar-collapse" id="navbar-responsive-collapse">
                <ul class="nav  navbar-nav navbar-right">
                    @if(Auth::guard('admin')->check())
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown" style="min-width: 160px">{{Auth::guard('admin')->user()->name}}</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('admin/auth/resetPassword')}}">resetPassword</a></li>
                                <li><a href="{{url('admin/auth/logout')}}">Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{url('admin/auth/login')}}">Login</a></li>
                        <li><a href="{{url('admin/auth/register')}}">Register</a></li>

                    @endif
                    <li><a href="{{url('/home')}}">Home</a></li>
                </ul>

            </div>



        </div>

    </div>
    @append