@extends('layout')

@section('title')
    Login
@endsection

@section('content')
    <div class="container-fluid vh-100">
        <div class="d-flex justify-content-center align-items-center h-100">
            <form class="shadow-lg p-3 bg-light rounded-3">
                <div class="mb-3 text-center">
                    Login
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="email address"
                           aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password">
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
