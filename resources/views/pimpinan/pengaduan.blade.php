@extends('layouts.app')
@section('content')

   {{-- datatable --}}

    <table id="example" class="display table-dark" >
        <thead>
            <tr>
                <th >Name</th>
                <th>Kode</th>
                <th>Isi</th>
                <th>Tanggal</th>
                <th>Judul</th>
                <th>Bukti</th>
                <th >Status</th>
                {{-- <th>Aksi</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            @foreach ($user->pengaduan as $pengaduan)

            <tr>
                <td style="font-size: 16px">{{$user->name}}</td>
                <td style="font-size: 16px">{{$pengaduan->kode}}</td>
                <td style="font-size: 16px">{{$pengaduan->isi}}</td>
                <td style="font-size: 16px">{{$pengaduan->tanggal}}</td>
                <td style="font-size: 16px">{{$pengaduan->judul}}</td>
                @php
                $test1 = DB::table('bukti')->where([
                ['kode_pengaduan', '=', $pengaduan->kode],
                ])->get();   
                    foreach ($test1 as $ini) {
                    }  
                 @endphp
                <td><button onclick="location.href='{{'/bukti/'.$ini->bukti}}'" type="button" class="btn btn-dark" style="font-size:14px;">Lihat Bukti</button>
                </td>
                <td style="font-size: 16px" >{{$pengaduan->status}}</td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
  
@endsection