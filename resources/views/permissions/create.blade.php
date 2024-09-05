@extends('layout.master')
@section('contents')
@section('title','Create Permissions')
@section('title1','Home')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@yield('title')
                            <a href="{{route('permissions.index')}}" class="btn btn-sm btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('permissions.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="permission">Permission</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection