@extends('layouts.app')
@section('content')

   {{-- datatable --}}
    <form action="" method="post">
    @csrf
    <div class="input-group mb-3">
        <div class="col-2">
            <label for="name" class="col-form-label">Nama Pengadu</label>
        </div>
        <div class="col-3">
            <input type="text" name="name" class="form-control" value="{{$user->name}}" readonly>
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="col-2">
            <label for="isi" class="col-form-label">Isi Pengaduan</label>
        </div>
        <div class="col-3">
            <input type="textarea" name="isi" class="form-control" value="{{$pengaduan->isi}}">
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="col-2">
            <label for="title" class="col-form-label">Judul</label>
        </div>
        <div class="col-3">
            <input type="text" name="judul" class="form-control" value="{{$pengaduan->judul}}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mfs-3">Tambah</button>
    </form>
@endsection