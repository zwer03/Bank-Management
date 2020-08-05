@extends('layouts.app')

@section('navigation')
    @include('layouts.nav')
@endsection

@section('content')


@guest
<div>Not Available</div>

@else

@include('layouts.homebutton')

   <div class="container">
    <div class="col-auto">
        <a class="btn btn-primary" href="{{ route('bank_types.create') }}"> Create Bank Type</a>
    </div>
    <br>
        <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Bank Type</th>
            <th>Description</th>
        </tr>
        @foreach ($bankTypes as $bankType)
        <tr>
            <td><a class="nav-item" href="{{route('bank_types.edit', $bankType -> id)}}">{{$bankType->id}}</a></td>
            <td>{{$bankType->bank_type}}</td>
            <td>{{$bankType->description}}</td>

        @endforeach





</div>
@endguest


@endsection
