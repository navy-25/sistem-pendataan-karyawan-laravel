@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('home')}}">Beranda</a> 
</li>

@endsection

@section('content')    
@if(auth()->user()->is_admin == 'user' || auth()->user()->is_admin == 'tamu' )
    @include('menu.home.home_user')     
@endif
@if(auth()->user()->is_admin == 'admin')
    @include('menu.home.home_admin')     
@endif
@endsection
