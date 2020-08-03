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
                        <br>
                        <div class="col-12 col-md-10 col-lg-8" >
                        <form class="card card-sm" type="get" action="{{route('wawa')}}">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input name="qwe" class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search for bank name">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-primary" type="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

