@extends('layout.master')
@section('contents')
@section('title','Edit Permission')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            @yield('title')
                            <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-primary float-end">Back</a>
                        </h5>
                    </div>
                    <div class="card-body mt-3">
                        <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <div>
                            <label for="name" class="mb-2"> Permission Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $permission->name }}">
                          </div>
                          <button class="btn btn-sm btn-success mt-3">Updae</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection