@extends('layouts.app')
@section('content')

   {{-- datatable --}}

    <table id="example" class="display table-dark" >
        <a href="{{route('tambah.pengaduan')}}" class="btn btn-sm btn-primary mb-3" style="margin-left: 10px;background-color:#8D9EFF">Buat Pengaduan</a>
        <thead>
            <tr>
                <th >Name</th>
                <th>Kode</th>
                <th>Isi</th>
                <th>Tanggal</th>
                <th>Judul</th>
                <th >Status</th>
                <th class="text-center">Aksi</th>
                {{-- <th>Aksi</th> --}}
            </tr>
        </thead>
        <tbody>
            <tr> 
                @foreach ($users as $user)
                <td style="font-size: 16px">{{$user->name}}</td>
                @endforeach
                @foreach ($users as $item)
                @foreach ($item->pengaduan as $pengaduan)
                <td style="font-size: 16px">{{$pengaduan->kode}}</td>
                <td style="font-size: 16px">{{$pengaduan->isi}}</td>
                <td style="font-size: 16px">{{$pengaduan->tanggal}}</td>
                <td style="font-size: 16px">{{$pengaduan->judul}}</td>
                <td style="font-size: 16px" >{{$pengaduan->status}}</td>
                <td class="text-center">
                    <form method="post" action="{{'pengaduan'}}/{{$pengaduan->kode}}" >
                        @csrf
                        <button type="submit" name="action" value="konfirmasi" class="btn btn-primary"  style="color: #33a1eb;font-size:12px;">Konfirmasi</button>
                        <button type="submit" name="action" value="ditolak" class="btn hapus btn-warning" style="color: #d31c4a;font-size:12px">Tolak Permintaan</button>
                    </form>
                </td>
                @endforeach
                @endforeach
            </tr>
        </tbody>
    </table>
  
@endsection