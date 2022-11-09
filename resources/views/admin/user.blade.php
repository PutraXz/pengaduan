@extends('layouts.app')
@section('content')

   {{-- datatable --}}

    <table id="example" class="display table">
        <a href="{{route('tambah.user')}}" class="btn btn-sm btn-primary mb-3" style="margin-left: 10px;background-color:#8D9EFF">Tambah User</a>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->level}}</td>
                <td>
                    <form action="{{'user'}}/{{$user->id}}">
                        @csrf
                        <button class="btn"  style="color: #33a1eb;font-size:16px"><i class="far fa-edit">&#xE03B;</i></button>
                    </form>
                    <form method="POST" action="{{ url('admin/user')}}/{{$user->id}}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn hapus" onclick="return confirm('Hapus Data?')" style="color: #d31c4a;font-size:16px"><i class="fas fa-trash-alt">&#xE03B;</i></button>
                    </form> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  
@endsection