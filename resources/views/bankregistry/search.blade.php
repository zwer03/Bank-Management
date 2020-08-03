@extends('layouts.app')


@section('content')

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
      @foreach ($banks as $bank)
      <tr>
        <th scope="row">{{$bank->id}}</th>
        <td>{{$bank->bank_name}}</td>
        <td>{{$bank->branch}}</td>
        <td>{{$bank->bank_type_id}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>


@guest




@endguest
@endsection
