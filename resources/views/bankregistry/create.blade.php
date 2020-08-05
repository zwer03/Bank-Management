@extends('layouts.app')


@section('content')


@guest

<div>Not Available</div>


@else

    @include('layouts.homebutton')


    <div class="container">
        <div class="card-header">{{__('Bank Registry')}} </div>
            <form method="POST" action="{{route('bank_registries.store')}}">
            @csrf

                <div class="form-group">
                    <label for="bank_name">Bank Name:</label>
                    <input type="text" class="form-control @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name">

                    @error('bank_name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror


            <div class="form-group">
                {!! Form::label('bank_type', 'Bank Type') !!}
                {!! Form::select('bank_type_id', $banktype, null, ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                <label for="branch">Branch:</label>
                <input type="text" class="form-control @error('branch') is-invalid @enderror" id="branch" name="branch">

                @error('branch')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address">

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group">
                <label for="remarks">Remarks:</label>
                <input type="text" class="form-control @error('remarks') is-invalid @enderror" id="remarks" name="remarks">

                @error('remarks')
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
