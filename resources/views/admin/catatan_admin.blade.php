@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('home')}}">Beranda</a> 
</li>
@if(auth()->user()->is_admin == 'admin')
<li class="breadcrumb-item">
    Buat Catatan
</li>
@endif
@endsection

@section('content')    
<form action="/home/{{$lpj->id}}/catatan_admin/update_catatan" method="post">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Buat Catatan</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="catatan" ></textarea>
    </div>
    <button class="btn btn-warning" type="submit">
        Simpan
    </button>
</form>
@endsection
