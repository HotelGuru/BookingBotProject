@extends('layouts.app')
<!-- display reservations -->
@section('content')
    <h1 style="margin-left:5%">Reservations</h1>
    @if(count($reservations) > 0)
        @foreach($reservations as $reservation)
            <div class="well" style="margin-left:10%; margin-right:10%;">
                <div class="row">  
                    <h3>{{$reservation->user_name}} made a reservation in <a href="hotels/{{$reservation->hotel_id}}">hotel</a> </h3>
                    
                    <h5>Gender: {{$reservation->gender}}, Age: {{$reservation->age}},Email: {{$reservation->email}},
                        <br>
                        Phone Number: {{$reservation->mobile_number}},Card Number: {{$reservation->card_number}}
                        <br>
                        <small>Created at {{$reservation->created_at}}</small>
                    </h5>
                    
                </div>
            </div>
            <hr>
        @endforeach
        <div style="margin-left:5%">
        {{$reservations->links()}}
        </div>
    @else
        <p style="margin-left:10%; margin-right:10%;">No reservations found</p>
    @endif
@endsection