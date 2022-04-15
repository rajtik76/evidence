@extends('layout')

@section('title')
    Login
@endsection

@section('content')
    <div class="container-fluid vh-100">
        <div class="d-flex justify-content-center align-items-center h-100">
            <form class="shadow-lg p-3 bg-light rounded-3" method="post" action="{{ route('user.authenticate') }}">
                @csrf()
                <div class="mb-3 text-center">
                    Login
                </div>
                <div class="mb-3">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="email address" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="password">
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
