@extends('layouts.app')



@section('content')


@guest
<div>Not Available</div>

@else

@include('layouts.homebutton')
    <br>
   <div class="container col-lg-12 margin-tb">
    <div class="float-left m-1">
        <a class="btn btn-primary" href="{{ route('bank_types.create') }}"> Add</a>
    </div>

   
    

    <form method="post" action="{{route('deleteAllBankType')}}">
    @csrf
        <table class="table table-bordered">
        <tr>
            <th></th>
            <th>ID</th>
            <th>Bank Type</th>
            <th>Description</th>
        </tr>
        @foreach ($bankTypes as $bankType)
        <tr>
            <td><input name='id[]' type="checkbox" class="sub_chk" value="{{$bankType->id}}"></td>
            <td><a class="nav-item" href="{{route('bank_types.edit', $bankType -> id)}}">{{$bankType->id}}</a></td>
            <td>{{$bankType->bank_type}}</td>
            <td>{{$bankType->description}}</td>

        @endforeach


    <div class="float-left m-1" >
        <button style="cursor:pointer" type="submit" class="btn btn-primary">Delete</button>
    </div>

    <div class="float-right m-1">
        {{ $bankTypes->links() }}
    </div>
        
     </form>






</div>
@endguest


@endsection
