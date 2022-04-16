@extends('layout-signed')

@section('title', $title)

@section('content')
    <div class="col-6 offset-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $title }}</h5>
                <hr>
                <form method="post" action={{! $action }}"">
                    @csrf()
                    <div class="mb-3">
                        <input type="text" name="name" value="{{ old('name', $user) }}" class="form-control" placeholder="user name" aria-describedby="nameHelpBlock">
                        <div id="nameHelpBlock" class="form-text">
                            User name must be 3-255 characters long.
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" value="{{ old('email', $user) }}" class="form-control" placeholder="email address">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="password" aria-describedby="passwordHelpBlock">
                        <div id="passwordHelpBlock" class="form-text">
                            Your password must be 6-20 characters long.
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control"
                               placeholder="confirm password">
                    </div>
                    <div class="form-check mb3">
                        <input class="form-check-input" type="checkbox" name="is_admin" value="1" @checked(old('is_admin', $user)) id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Admin rights
                        </label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <x-form-error :errors="$errors" />
                </form>
            </div>
        </div>
    </div>
@endsection
