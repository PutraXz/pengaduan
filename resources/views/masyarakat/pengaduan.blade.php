@extends('layouts.app')
@section('content')

   {{-- datatable --}}

    <table id="example" class="display table">
        <a href="{{route('tambah.pengaduan')}}" class="btn btn-sm btn-primary mb-3" style="margin-left: 10px;background-color:#8D9EFF">Buat Pengaduan</a>
        <thead>
            <tr>
                <th>Name</th>
                <th>Kode</th>
                <th>Isi</th>
                <th>Tanggal</th>
                <th>Judul</th>
                <th>Status</th>
                {{-- <th>Aksi</th> --}}
            </tr>
        </thead>
        <tbody>

            @foreach ($users->pengaduan as $user)
            <tr>
                <td>{{auth()->user()->name}}</td>
                <td>{{$user->kode}}</td>
                <td>{{$user->isi}}</td>
                <td>{{$user->tanggal}}</td>
                <td>{{$user->judul}}</td>
                <td>{{$user->status}}</td>
                {{-- <td>
                    <form action="{{'pengaduan'}}/{{$user->kode}}">
                        @csrf
                        <button class="btn"  style="color: #33a1eb;font-size:16px"><i class="far fa-edit">&#xE03B;</i></button>
                    </form>
                    <form method="POST" action="{{ url('home/pengaduan')}}/{{$user->kode}}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn hapus" onclick="return confirm('Hapus Data?')" style="color: #d31c4a;font-size:16px"><i class="fas fa-trash-alt">&#xE03B;</i></button>
                    </form> 
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
  
@endsection