@extends('layouts.app')

@section('navigation')
    @include('layouts.nav')
@endsection

@section('content')


@guest
<div>Not Available</div>

@else
{{--
    <div class="container col-lg-12 margin-tb">
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
        </div>
    </div>
--}}


   <div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <form class="card card-sm" method="post" action="{{route('search')}}">
                @csrf
                <div class="card-body row no-gutters align-items-center">
                    <div class="col-auto">
                        <i class="fas fa-search h4 text-body"></i>
                    </div>
                    <!--end of col-->
                    <div class="col">
                        Bank ID
                        <input class="form-control form-control-lg form-control-borderless" type="search" name="bankid" placeholder="Search for Bank ID">
                        Bank Type
                        <div class="form-group">
                            <select class="form-control" name="banktype">
                                <option> </option>
                                @foreach($btList as $btype)
                                  <option value="{{$btype->id}}">{{$btype->bank_type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <!--end of col-->
                    <div class="col-auto">
                        <button class="btn btn-lg btn-primary" type="submit">Search</button>
                    </div>
                    <!--end of col-->
                </div>
            </form>
        </div>
        <!--end of col-->
    </div>
    <br>

        <div class="col-auto">
            <a class="btn btn-primary" href="{{ route('bank_registries.create') }}"> Register Bank</a>
        </div>
        <br>
        <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Bank Name</th>
            <th>Bank Type</th>
            <th>Branch</th>
        </tr>
        @foreach ($bankRegistries as $bankRegistry)
        <tr>
            <td><a class="nav-item" href="{{route('bank_registries.edit', $bankRegistry -> id)}}">{{$bankRegistry->id}}</a></td>
            <td>{{$bankRegistry->bank_name}}</td>
            <td>{{$bankRegistry->banktype['bank_type']}}</td>
            <td>{{$bankRegistry->branch}}</td>
        @endforeach





</div>
@endguest


@endsection
