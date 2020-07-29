@extends('layouts.app')

@section('content')


@guest

<div>Not Available</div>
    

@else
<div class="container">
<div class="card-header">{{__('Create Bank Type')}} </div>
<form method="POST" action="{{route('bank_types.store')}}">
    @csrf

    <div class="form-group">
        <label for="bank_type">{{__('Bank Type')}}</label>
        <input type="text" class="form-control @error('bank_type') is-invalid @enderror" id="bank_type" name="bank_type">
    
            @error('bank_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

    <div class="form-group">
        <label for="description">{{__('Description')}}</label>
        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">
    
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

    <div class="form-group">
        <button style="cursor:pointer" type="submit" class="btn btn-primary">Save</button>
        <button style="cursor:pointer" type="reset" class="btn btn-primary">Clear</button>
    </div>
    
     @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
   


    </div>



    


@endguest

@endsection