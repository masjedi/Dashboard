@extends('layout.master')
@section('contents')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>
                        @yield('title') : {{$role->name}}
                        <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary float-end">Back</a>
                    </h5>
                </div>
                <div class="card-body mt-3">
                    <form action="{{ route('roles/'.$role->id.'/givepermission') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <div class="row">

                            @foreach($permissions as $permission)
                                <div class="col-md-3">
                                    <label for="permissions">
                                        <input type="checkbox"
                                         class="form-control"
                                          name="permission[]"
                                           value="{{ $permission->id }}">
                                           {{$permission->name}}
                                    </label>
                                </div>
                            @endforeach

                            </div>
                        </div>
                        <button class="btn btn-sm btn-success mt-3">Updae</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection