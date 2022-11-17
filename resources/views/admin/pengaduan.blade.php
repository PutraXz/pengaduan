@extends('layouts.app')
@section('content')

   {{-- datatable --}}

    <table id="example" class="display table-dark" >
        <a href="{{url('admin/add/pengaduan')}}" class="btn btn-sm btn-primary mb-3" style="margin-left: 10px;background-color:#8D9EFF">Buat Pengaduan</a>
        <thead>
            <tr>
                <th >Name</th>
                <th>Kode</th>
                <th>Isi</th>
                <th>Tanggal</th>
                <th>Judul</th>
                <th>Bukti</th>
                <th >Status</th>
                <th class="text-center">Aksi Status</th>
                <th class="text-canter">Aksi</th>
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
                <td class="text-center">
                    <form method="post" action="{{'pengaduan'}}/{{$pengaduan->kode}}" >
                        @csrf
                        <button type="submit" name="action" value="konfirmasi" class="btn btn-primary"  style="color: #33a1eb;font-size:12px;">Konfirmasi</button>
                        <button type="submit" name="action" value="ditolak" class="btn hapus btn-warning" style="color: #d31c4a;font-size:12px">Tolak Permintaan</button>
                    </form>
                </td>
                <td class="text-center" >
                    <form action="{{'pengaduan'}}/{{$pengaduan->kode}}">
                        @csrf
                        <button class="btn btn-primary"  style="color: #33a1eb;font-size:16px"><i class="far fa-edit">&#xE03B;</i></button>
                    </form>
                    <form method="POST" action="{{ url('admin/pengaduan')}}/{{$pengaduan->kode}}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn hapus btn-warning" onclick="return confirm('Hapus Data?')" style="color: #d31c4a;font-size:16px"><i class="fas fa-trash-alt">&#xE03B;</i></button>
                    </form> 
                </td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
  
@endsection