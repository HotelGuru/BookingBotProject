@extends('layouts.app')
<!-- display all available hotels -->
@section('content')
    <h1 style="margin-left:5%">Hotels</h1>
    @if(count($hotels) > 0)
        @foreach($hotels as $hotel)
            <div class="well" style="margin-left:10%; margin-right:10%;">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%; height:100%" src="/storage/cover_images/{{$hotel->cover_image}}">
                    </div>
                    <div class=" col-md-8 col-sm-8">
                        <h3><a href="hotels/{{$hotel->id}}">{{$hotel->name}}</a></h3>
                        <h5>Located in {{$hotel->city}}</h5>
                        <h5>Price per night is  {{$hotel->price}} $</h5>
                        <small>Description: <br>{{$hotel->description}}</small>
                        
                    </div>
                
                </div>
            </div>
            <hr>
        @endforeach
        <div style="margin-left:5%">
        {{$hotels->links()}}
        </div>
    @else
        <p style="margin-left:10%; margin-right:10%;">No hotels found</p>
    @endif
@endsection