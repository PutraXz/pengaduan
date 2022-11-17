@extends('layouts.app')
@section('content')

   {{-- datatable --}}
    <form action="{{route('admin.send_pengaduan')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="input-group mb-3">
        <div class="col-2">
            <label for="user" class="col-form-label">Nama Pengaduan</label>
        </div>
        <div class="col-3">
            <select class="form-control select2" style="width: 100%;" name="user">
                <option value="" selected></option>
          
                @foreach($users as $user)
                     <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
          
              </select>
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="col-2">
            <label for="isi" class="col-form-label">Isi Pengaduan</label>
        </div>
        <div class="col-3">
            <input type="textarea" name="isi" class="form-control" value="{{ old('isi') }}">
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="col-2">
            <label for="title" class="col-form-label">Judul</label>
        </div>
        <div class="col-3">
            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="col-2">
            <label for="filename" class="col-form-label">{{ __('File') }}</label>
        </div>
        <div class="col-3">
            <input type="file" name="file">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mfs-3">Tambah</button>
    </form>
@endsection