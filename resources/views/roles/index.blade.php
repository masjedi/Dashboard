@extends('layout.master')
@section('contents')
@section('title','Roles Table')
@section('title1','Home')

<div class="container">
    <div class="row">
        <div class="col-12">
            @if( session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>@yield('title')
                        <a href="{{route('roles.create')}}" class="btn btn-sm btn-primary float-end">Add new</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordored table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="{{ route('givepermission/', $item->roleid) }}" class="btn btn-sm btn-primary">Add/Edit Role Permissions</a>
                                    <a href="{{ route('roles.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('roles.destroy',$item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection