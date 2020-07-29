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
                    <div class="container">
                    <ul class="navbar">
                        <li class="nav-item">
                           <a class="nav-link" href="{{ route('banktype') }}">{{ __('Create Bank Type') }}</a>
            
                        </li>
            
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bankregistry') }}">{{ __('Bank Registry') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bankregistry/index') }}">{{ __('Bank List') }}</a>
                        </li>
                        
                    </ul>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
