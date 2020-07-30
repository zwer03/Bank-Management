@extends('layouts.app')


@section('content')


@guest
<div>Not Available</div>

@else

    <div class="container col-lg-12 margin-tb">
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
        </div>
    </div>

   <div class="container">

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