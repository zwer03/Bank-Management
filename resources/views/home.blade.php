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
                        <form class="card card-sm" type="get" action="{{route('search')}}">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <h4>Bank Name &nbsp;&nbsp;</h4>
                                    </div>
                                    <div class="col">
                                    <input name="bn-query" class="form-control form-control-lg form-control-borderless" type="search"  value="{{request('bn-query')}}">
                                    </div>
                                </div>
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <h4>Bank Type &nbsp;&nbsp;&nbsp;&nbsp;</h4>
                                    </div>
                                    <div class="col">
                                        <input name="bt-query" class="form-control form-control-lg form-control-borderless " type="search"  value="{{request('bt-query')}}">
                                    </div>
                                 </div>
                                 <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto align=center" >
                                        <button class="btn btn-lg btn-primary" type="submit" name="action" value="search">Search</button>
                                        <button class="btn btn-lg btn-primary" type="submit" name="action" value="clear">Clear</button>
                                    </div>
                                </div>
                                <br>
                            </form>
                        </div>
                        <br>
                        @if ($banks ?? ''!=null)
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Bank ID</th>
                                    <th scope="col">Bank</th>
                                    <th scope="col">Branch</th>
                                    <th scope="col">Bank Type</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($banks ?? '' as $bank)
                                  <tr>
                                    <th scope="row">{{$bank->id}}</th>
                                    <td>{{$bank->bank_name}}</td>
                                    <td>{{$bank->branch}}</td>
                                    <td>{{$bank->bank_type_id}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>


                        @endif
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

