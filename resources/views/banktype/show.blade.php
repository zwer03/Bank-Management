@extends('layouts.app')

@section('content')


@guest

<div>Not Available</div>
    

@else

<table class="table">
    <tr>
        <td>ID</td>
        <td>Bank Type</td>
        <td>Descritpion</td>
    </tr>
    @foreach ($bank_types as $bank_type)
    <tr>
        <td>{{$bank_type->id}}</td>
        <td>{{$bank_type->bank_type}}</td>
        <td>{{$bank_type->description}}</td>

        
    @endforeach




@endguest



@endsection