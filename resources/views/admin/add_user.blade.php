@extends('layouts.app')
@section('content')

   {{-- datatable --}}
    <form action="{{route('send.user')}}" method="post">
    @csrf
    <div class="input-group mb-3">
        <div class="col-2">
            <label for="title" class="col-form-label">Nama User</label>
        </div>
        <div class="col-3">
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="col-2">
            <label for="title" class="col-form-label">Email User</label>
        </div>
        <div class="col-3">
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="col-2">
            <label for="title" class="col-form-label">Password User</label>
        </div>
        <div class="col-3">
            <input type="text" name="password" class="form-control" value="{{ old('password') }}">
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="col-2">
            <label for="title" class="col-form-label">Level User</label>
        </div>
        <div class="col-3">
            <input type="text" name="level" class="form-control" value="{{ old('level') }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mfs-3">Tambah</button>
    </form>
@endsection