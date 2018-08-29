@extends('layouts.app')
<!-- make reservation form -->
@section('content')
<div style="width:40%">
    <h1>Make a Reservation</h1>
    {!! Form::open(['action' => 'ReservationsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <input name="id" type="hidden" value={{$id}}>
        <div class="form-group">
            {{Form::label('name', 'Full Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('gender', 'Gender')}}
            {{Form::text('gender', '', ['class' => 'form-control', 'placeholder' => 'Gender'])}}
        </div>
        <div class="form-group">
            {{Form::label('age', 'Age')}}
            {{Form::text('age', '', ['class' => 'form-control', 'placeholder' => 'Age'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
        </div>
        <div class="form-group">
            {{Form::label('mobile', 'Phone Number')}}
            {{Form::text('mobile', '', ['class' => 'form-control', 'placeholder' => 'Phone Number'])}}
        </div>
        <div class="form-group">
            {{Form::label('card', 'Card Number')}}
            {{Form::text('card', '', [ 'class' => 'form-control', 'placeholder' => 'Card Number'])}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}

</div>
@endsection