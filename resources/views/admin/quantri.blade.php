@extends('admin.master')
@section('content')

Chào mừng

@if (Auth::check())
    {{ Auth::user()->hoten }}
@else
    chưa
@endif

<hr>

@if (Auth::user()->quyen)
    Quyển : admin
@else
    Quyền : user
@endif

<hr>

<a href="{!! route('logout') !!}">Logout</a>
@endsection