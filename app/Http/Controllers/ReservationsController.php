<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Hotel;
use DB;
class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all reseravtion sorted by creation date descending
        $reservations = DB::table('reservations')
            ->orderBy('created_at','desc')->paginate(5);
            
        return view('reservations.index')->with('reservations',$reservations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created reservation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //get hotel id
        $hotelId= $request->input('id');

        //validate input
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'card' => 'required'
        ]);

        //save reservation
        $reservation = new Reservation();
        $reservation->user_name = $request->input('name');
        $reservation->gender = $request->input('gender');
        $reservation->age = $request->input('age');
        $reservation->email = $request->input('email');
        $reservation->mobile_number = $request->input('mobile');
        $reservation->card_number = $request->input('card');
        $reservation->hotel_id = $hotelId;
        $reservation->save();

        //decrease hotel empty rooms by one
        $hotel = Hotel::find($hotelId);
        $hotel->number_of_empty_rooms = $hotel->number_of_empty_rooms -1;
        $hotel->save();

        //get reservation number to dispaly it to user
        $lastReservation = DB::table('reservations')
            ->where('card_number',$request->input('card'))
            ->orderBy('created_at','desc')->first();
        //redirect to hotels page
        return redirect('/hotels')->with('success','Your reservation is done successfully, Your reservation number is '.$lastReservation->id);
    }

    /**
     * Display the reservation form.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dispaly the reservation form
        return view("reservations.make_reservation")->with('id',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
