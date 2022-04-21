@extends('layout')

@section('signed-content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid" id="app">
            <a class="navbar-brand" href="{{ route('evidence.index') }}">
                <img src="https://laravel.com/img/logomark.min.svg" alt="" width="30" height="24"
                     class="d-inline-block align-text-top">
                Evidence
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if(auth()->user()->isAdmin())
                        <li class="nav-item">
                            <a @class(["nav-link", "active" => request()->route()->named('user.list')]) @if(request()->route()->named('user.list'))aria-current="page" @endif href="{{ route('user.list') }}">{{ __('navbar.users') }}</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a @class(["nav-link", "active" => request()->route()->named('department.index')]) @if(request()->route()->named('department.index'))aria-current="page" @endif href="{{ route('department.index') }}">{{ __('navbar.departments') }}</a>
                    </li>
                        <li class="nav-item">
                            <a @class(["nav-link", "active" => request()->route()->named('employee.index')]) @if(request()->route()->named('employee.index'))aria-current="page" @endif href="{{ route('employee.index') }}">{{ __('navbar.employees') }}</a>
                        </li>
                </ul>
            </div>
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ mix('images/flags/' . config('languages')[app()->getLocale()]['flag']) }}" alt="locale">
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @foreach(config('languages') as $language => $languageData)
                        @if($language != app()->getLocale())
                            <li>
                                <a class="dropdown-item" href="{{ route('language.switch', [$language]) }}">
                                    <img src="{{ mix('images/flags/' . $languageData['flag']) }}" alt="locale"> <span class="align-middle">{{ $languageData['title'] }}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            &nbsp;
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    {{ auth()->user()->name }}
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="{{ route('user.logout') }}">{{ __('navbar.logout') }}</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row mt-3">
            @yield('content')
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ mix('js/app.js') }}"></script>
@endsection
