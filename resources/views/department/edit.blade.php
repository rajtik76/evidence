@extends('layout-signed')

@section('title', $title)

@section('content')
    <div class="col-6 offset-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $title }}</h5>
                <hr>
                <form method="post" action="{!! $action !!}">
                    @csrf()
                    <div class="mb-3">
                        <input type="text" name="name" value="{{ old('name', $department) }}" class="form-control" placeholder="{{ __('department.edit.name') }}" aria-describedby="nameHelpBlock">
                        <div id="nameHelpBlock" class="form-text">
                            {{ __('department.edit.helpBlocks.name') }}
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">{{ __('department.edit.submit') }}</button>
                    </div>
                    <x-form-error :errors="$errors" />
                </form>
            </div>
        </div>
    </div>
@endsection
