@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div>
                    <ul>
                        <li>
                            <a class="nav-item" href="{{route('bank_registries.create')}}">
                            {{ __('Bank Registry') }}
                            </a>
                        </li>
                        <li>
                            <a class="nav-item" href="{{route('bank_registries.index')}}">
                            {{ __('Bank List') }}
                            </a>
                        </li>
                        <li>
                            <a class="nav-item" href="{{route('bank_types.create')}}">
                            {{ __('Create Bank Type') }}
                            </a>
                        </li>

                          <li>
                            <a class="nav-item" href="{{route('bank_types.index')}}">
                            {{ __('Bank Type List') }}
                            </a>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
