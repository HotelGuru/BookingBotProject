@extends('layouts.app')
<!-- this is the homepage -->
@section('content')
<br><br><br>
<!-- chatbot only appear if not logged in -->
@if(Auth::guest())
<div style="background-color:white;color:#3490dc; position: absolute; 
border:black;top: 20%;border-style: outset;border: 6px solid #3490dc;
border-radius: 20px; padding:20px">
    <h4> Looking for a hotel?</h4>
    <h6>Let me help you :)</h6>
    {!! Form::open(['action' => 'SearchController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('city', 'Location')}}
            {{Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'City'])}}
        </div>
        <div class="form-group">
            {{Form::label('price', 'Maximum Price')}}
            {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Price'])}}
        </div>
        {{Form::submit('Search', ['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}

</div>
@endif
<img  style="margin-top: -70px;margin-left:-11%;width:122%;" src="/storage/cover_images/bg-2.jpg">
<br><br>
    <div class="row justify-content-center">
       <h1 style="">Welcome to Hotel Guru </h1>
       <h3>Here we help you to book the most suitable hotel during your staying in cuntery</h3>
       <h3>You can view available hotels through <a href="/hotels"> here</a></h3>
    </div>
    
@endsection