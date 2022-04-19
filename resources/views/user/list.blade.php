@extends('layout-signed')

@php
    $title = trans('user.list.title')
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
                    <a class="btn btn-success" href="{{ route('user.new') }}">{{ __('user.list.table.actions.new') }}</a>
                </div>
            </div>
            <hr>
            <div class="container-fluid">
                <div class="row">
                    <x-grid :grid="$grid"/>
                </div>
                <div class="row">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
