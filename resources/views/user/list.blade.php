@extends('layout-signed')

@php
    $title = 'User list'
@endphp

@section('title', $title)

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h5 class="card-title">{{ $title }}</h5>
                </div>
                <div class="col text-end">
                    <a class="btn btn-success" href="{{ route('user.new') }}">New user</a>
                </div>
            </div>
            <hr>
            <div class="container-fluid">
                <div class="row">
                    <table class="table table-striped">
                        <thead class="table-dark">
                        <th scope="row">Id</th>
                        <th scope="row">Name</th>
                        <th scope="row">Email</th>
                        <th scope="row" class="w-25">Actions</th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('user.edit', ['user' => $user->id]) }}">Edit</a>
                                    @if(auth()->user()->id != $user->id)
                                        <a class="btn btn-danger" href="{{ route('user.delete', ['user' => $user->id]) }}" onclick="return confirm('Are you sure ?');">Delete</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
