<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * gets the search form inputs to dispaly the result.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //get the search parameters
        $city= $request->input('city');
        $price = $request->input('price');
        //if both city and price are not set then return to homepage
        if(!isset($city) && !isset($price)){
            return view('hotels.homepage');
        }
        //if price is not set then search by city only
        else if(!isset($price)){
            $hotels = DB::table('hotels')
                    ->where('city','like','%'.$city.'%')
                    ->where('number_of_empty_rooms','>',0)
                    ->orderBy('price','asc')
                    ->paginate(5);
        //if both are set then search by them
        }else{
            $hotels = DB::table('hotels')
            ->where('city','like','%'.$city.'%')
            ->where('price','<',$price)
            ->where('number_of_empty_rooms','>',0)
            ->orderBy('price','asc')
            ->paginate(5);
        }
        //retrun the search result view
        return view('hotels.search')->with('hotels',$hotels);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
