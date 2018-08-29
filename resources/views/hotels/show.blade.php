@extends('layouts.app')
<!-- show a single hotel view -->
@section('content')
    <h1>{{$hotel->name}}</h1>
   
            <div class="well">
                <div class="row">
                    <div class=" col-md-8 col-sm-8">
                        @if($hotel->cover_image!="noimage.jpg")
                            <img style="width:100%" src="/storage/cover_images/{{$hotel->cover_image}}">
                        @endif
                        <br><br>
                        <h5>Located in {{$hotel->address}}</h5>
                        <h5>Price per night is  {{$hotel->price}} $</h5>
                        <h5>Number of empty rooms is  {{$hotel->number_of_empty_rooms}}</h5>
                        <small>Description: <br>{{$hotel->description}}</small>
                        <hr>
                    </div>
                
                </div>
               
                <!-- these links appear if only user logged in -->
                @if(!Auth::guest())
                <a class="btn btn-primary" href="/hotels/{{$hotel->id}}/edit">Edit</a>
                <a class="btn btn-danger" href="/hotels/{{$hotel->id}}/delete">Delete</a>
                <br>
                <br>
                
                @endif
                <a class="btn btn-primary" href="/hotels"> Go Back</a>
                </div>

            
@endsection