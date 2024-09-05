@extends('layout.master')
@section('contents')
@section('title','Create User')
@section('title1','Home')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@yield('title')
                            <a href="{{route('users.index')}}" class="btn btn-sm btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('users.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="permission">Name</label>
                                <input type="text" name="name" class="form-control">
                                @error('name') <span class="text-danger">{{ $message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="permission">Email</label>
                                <input type="email" name="email" class="form-control">
                                @error('email') <span class="text-danger">{{ $message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="permission">Password</label>
                                <input type="password" name="password" class="form-control">
                                @error('password') <span class="text-danger">{{ $message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="permission">Role</label>
                                <select name="roles[]" class="form-control" multiple>
                                    <option value="">Select Role</option>
                                    @foreach($roles as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                    @endforeach
                                </select>
                                @error('roles') <span class="text-danger">{{ $message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection