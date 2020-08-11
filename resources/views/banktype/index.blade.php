@extends('layouts.app')



@section('content')


@guest
<div>Not Available</div>

@else



<div class="container col-lg-12 margin-tb">
    @include('layouts.homebutton')
      <br>



    <div class="container">

    <div class="float-left m-1">
        <a class="btn btn-primary" href="{{ route('bank_types.create') }}"> Add</a>
    </div>

    <div class="float-left m-1" >
        <button style="cursor:pointer" type="submit" class="btn btn-primary">Delete</button>
    </div>

    <form method="post" action="{{route('bank_types.deleteAll')}}">
    @csrf
        <table class="table table-bordered">
        <tr>
            <th></th>
            <th>@sortablelink('id','ID')</th>
            <th>@sortablelink('bank_type','Bank Type')</th>
            <th>Description</th>
        </tr>
        @foreach ($bankTypes as $bankType)
        <tr>
            <td><input name='id[]' type="checkbox" class="sub_chk" value="{{$bankType->id}}"></td>
            <td><a class="nav-item" href="{{route('bank_types.edit', $bankType -> id)}}">{{$bankType->id}}</a></td>
            <td>{{$bankType->bank_type}}</td>
            <td>{{$bankType->description}}</td>

        @endforeach





    <div class="float-right m-1">
        {!! $bankTypes->appends(Request::except('page'))->render() !!}
    </div>

     </form>
     </div>






</div>
@endguest


@endsection
