@extends('layout-signed')

@php
    $title = trans('department.index.title')
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
                    <a class="btn btn-success" href="{{ route('department.new') }}">{{ __('department.index.table.actions.new') }}</a>
                </div>
            </div>
            <hr>
            <div class="container-fluid">
                <div class="row">
                    <x-grid :grid="/**@var \App\Services\Grid\Grid $grid */ $grid"/>
                </div>
                <div class="row">
                    {{ $grid->getDatasource()->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
