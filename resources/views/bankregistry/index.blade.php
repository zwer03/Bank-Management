@extends('layouts.app')


@section('content')


@guest
<div>Not Available</div>

@else
<div container>

  



        <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Bank Name</th>
            <th>Bank Type ID</th>
            <th>Branch</th>
        </tr>
        @foreach ($banks as $bank)
        <tr>
            <td> {{++$i}}</td>
            <td>{{$bank->bank_name}}</td>
            <td>{{$bank->bank_type_id}}</td>
            <td>{{$bank->branch}}</td>
        @endforeach

    
    
    

</div>
@endguest


@endsection