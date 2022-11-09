@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-8">
            <div class="card-group">
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="col-2">
                                <label for="title" class="col-form-label">Nama User</label>
                            </div>
                            <div class="col-3">
                                <input type="text" name="name" class="form-control" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="col-2">
                                <label for="title" class="col-form-label">Email User</label>
                            </div>
                            <div class="col-3">
                                <input type="text" name="email" class="form-control" value="{{$user->email}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection