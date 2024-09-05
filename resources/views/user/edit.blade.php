@extends('layout.master')
@section('contents')
@section('title','Edit User')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>
                        @yield('title')
                        <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary float-end">Back</a>
                    </h5>
                </div>
                <div class="card-body mt-3">
                    <form action="{{ route('users.update',$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name" class="mb-2"> User Name </label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>
                        <div>
                            <label for="name" class="mb-2"> Email</label>
                            <input type="text" class="form-control" name="email" readonly value="{{ $user->email }}">
                        </div>
                        <div>
                            <label for="name" class="mb-2"> Password</label>
                            <input type="text" class="form-control" name="password">
                        </div>
                        <div>
                            <label for="name" class="mb-2"> User Roles</label>
                            <select name="roles[]" id="" class="form-control" multiple>
                                <option value="">Select Role</option>
                                @foreach( $roles as $role)
                                    <option value="{{ $role }}", 
                                    {{ in_array($role, $userRoles) ? 'selected' : '' }}
                                >
                                    {{ $role }}

                                </option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-sm btn-success mt-3">Updae</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection