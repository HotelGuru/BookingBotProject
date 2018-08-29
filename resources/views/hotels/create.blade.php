@extends('layouts.app')
<!-- create a hotel form view -->
@section('content')
<div >
    <h1>Add Hotel</h1>
    {!! Form::open(['action' => 'HotelsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('city', 'City')}}
            {{Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'City'])}}
        </div>
        <div class="form-group">
            {{Form::label('address', 'Address')}}
            {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Address'])}}
        </div>
        <div class="form-group">
            {{Form::label('price', 'Price')}}
            {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Price'])}}
        </div>
        <div class="form-group">
            {{Form::label('numberOfRooms', 'Number Of Rooms')}}
            {{Form::text('numberOfRooms', '', ['class' => 'form-control', 'placeholder' => 'Number Of Rooms'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', [ 'class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        <div class="form-group">
                {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}

</div>
@endsection