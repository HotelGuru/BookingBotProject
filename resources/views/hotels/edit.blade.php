@extends('layouts.app')
<!-- edit a hotel form view -->
@section('content')
<div >
    <h1>Edit Hotel</h1>
    {!! Form::open(['action' => ['HotelsController@update',$hotel->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $hotel->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('city', 'City')}}
            {{Form::text('city', $hotel->city, ['class' => 'form-control', 'placeholder' => 'City'])}}
        </div>
        <div class="form-group">
            {{Form::label('address', 'Address')}}
            {{Form::text('address', $hotel->address, ['class' => 'form-control', 'placeholder' => 'Address'])}}
        </div>
        <div class="form-group">
            {{Form::label('price', 'Price')}}
            {{Form::text('price', $hotel->price, ['class' => 'form-control', 'placeholder' => 'Price'])}}
        </div>
        <div class="form-group">
            {{Form::label('numberOfRooms', 'Number Of Rooms')}}
            {{Form::text('numberOfRooms', $hotel->number_of_empty_rooms, ['class' => 'form-control', 'placeholder' => 'Number Of Rooms'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', $hotel->description, [ 'class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

</div>
@endsection