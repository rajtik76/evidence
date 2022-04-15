@extends('layout-signed')

@section('title', 'List of users')

@section('content')
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
                            <a class="btn btn-primary">Edit</a>
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
@endsection
