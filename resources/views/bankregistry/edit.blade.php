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
    <form action="{{ route('bank_registries.update',$bankRegistry->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" value="{{$bankRegistry->id}}" class="form-control" id="id" name="id" disabled>
        </div>


        <div class="form-group">
            <label for="bank_name">Bank Name:</label>
            <input type="text" value="{{$bankRegistry->bank_name}}" class="form-control @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name">
    
            @error('bank_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    
        <div class="form-group">
            {!! Form::label('bank_type', 'Bank Type:') !!}
            {!! Form::select('bank_type_id', $banktype, $bankRegistry->bank_type_id, ['class'=>'form-control', 'value'=>'{{$bankRegistry->bank_type_id}}']) !!}  
        </div>

    
        <div class="form-group">
            <label for="branch">Branch:</label>
            <input type="text" value="{{$bankRegistry->branch}}" class="form-control @error('branch') is-invalid @enderror" id="branch" name="branch">
            
            @error('branch')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" value="{{$bankRegistry->address}}" class="form-control @error('address') is-invalid @enderror" id="address" name="address">
    
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    
        </div>

        <div class="form-group">
            <label for="remarks">Remarks:</label>
            <input type="text" value="{{$bankRegistry->remarks}}" class="form-control @error('remarks') is-invalid @enderror" id="remarks" name="remarks">
    
            @error('remarks')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    
    
        </div>
        
         <div style="float: left; padding: 10px">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Save</button>
        </div>

        </form>

        <div style="float: left; padding: 10px">
           

            <form action="{{route('bank_registries.destroy',$bankRegistry->id)}}" method="POST">
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