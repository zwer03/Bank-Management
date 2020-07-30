@extends('layouts.app')
   
@section('content')

@guest
<div>not available</div>

@else

    <div class="container col-lg-12 margin-tb">
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
    </div>
    </div>

    <div class="container">
    <form action="{{ route('bank_types.update',$bankType->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" value="{{$bankType->id}}" class="form-control" id="id" name="id" disabled>
        </div>


        <div class="form-group">
            <label for="bank_type">Bank Type:</label>
            <input type="text" value="{{$bankType->bank_type}}" class="form-control @error('bank_type') is-invalid @enderror" id="bank_type" name="bank_type">
    
            @error('bank_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" value="{{$bankType->description}}" class="form-control @error('remarks') is-invalid @enderror" id="description" name="description">
    
            @error('remarks')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    
    
        </div>
        <div class>
        <button style="cursor:pointer" type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
        <div class="form-group">
            

            <form action="{{route('bank_types.destroy',$bankType->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button style="cursor:pointer" type="submit" onclick="return confirm('Are you sure?')" class="btn btn-primary">Delete</button>
            </form>
        
        </div>
        

        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif

    </div>
    </div>
   
    

@endguest
@endsection