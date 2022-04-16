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
                        <input type="text" name="name" value="{{ old('name', $user) }}" class="form-control" placeholder="{{ __('user.edit.placeholders.name') }}" aria-describedby="nameHelpBlock">
                        <div id="nameHelpBlock" class="form-text">
                            {{ __('user.edit.helpBlocks.name') }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" value="{{ old('email', $user) }}" class="form-control" placeholder="{{ __('user.edit.placeholders.email') }}">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="{{ __('user.edit.placeholders.password') }}" aria-describedby="passwordHelpBlock">
                        <div id="passwordHelpBlock" class="form-text">
                            {{ __('user.edit.helpBlocks.password') }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control"
                               placeholder="{{ __('user.edit.placeholders.password_confirmation') }}">
                    </div>
                    <div class="form-check mb3">
                        <input class="form-check-input" type="checkbox" name="is_admin" value="1" @checked(old('is_admin', $user)) id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ __('user.edit.placeholders.isAdmin') }}
                        </label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">{{ __('user.edit.submit') }}</button>
                    </div>
                    <x-form-error :errors="$errors" />
                </form>
            </div>
        </div>
    </div>
@endsection
