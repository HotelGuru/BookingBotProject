<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Hotel;
use DB;
class HotelsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //I used middleware to prevent unlogged user from using some functionalities
        $this->middleware('auth', ['except' => ['home','index', 'show','search']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get available tables from database sorted by creation data descending
        //using paginate to enable pages number in view
        $hotels = DB::table('hotels')
            ->where('number_of_empty_rooms','>',0)
            ->orderBy('created_at','desc')->paginate(5);

        return view('hotels.index')->with('hotels',$hotels);
    }
    /**
     * Show the homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        //returning the homepage view
        return view('hotels.homepage');
    }

    /**
     * Show the form for creating a new hotel.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotels.create');
    }

    /**
     * Store a newly created hotel in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate inputs
        $this->validate($request, [
            'name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'price' => 'required',
            'numberOfRooms' => 'required',
            'description' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            //if no image upload then use the default noimage.jpg image
            $fileNameToStore = 'noimage.jpg';
        }
        //save the new hotel
        $hotel = new Hotel();
        $hotel->name = $request->input('name');
        $hotel->city = $request->input('city');
        $hotel->address = $request->input('address');
        $hotel->price = $request->input('price');
        $hotel->number_of_empty_rooms = $request->input('numberOfRooms');
        $hotel->description = $request->input('description');
        $hotel->cover_image = $fileNameToStore;
        $hotel->save();
        //redirect to hotels with successful note
        return redirect('/hotels')->with('success','Hotel is added successfully.');
    }

    /**
     * Display the specified hotel.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get the hotel by id
        $hotel = Hotel::find($id);
        //view the hotel
        return view('hotels.show')->with('hotel',$hotel);
    }

    /**
     * Show the form for editing the specified hotel.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get the hotel by id
        $hotel = Hotel::find($id);
        //show the form for editing the specified hotel
        return view('hotels.edit')->with('hotel',$hotel);
    }

    /**
     * Update the specified hotel in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate input
        $this->validate($request, [
            'name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'price' => 'required',
            'numberOfRooms' => 'required',
            'description' => 'required',
        ]);

         // Handle File Upload
         if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        //save the upadated hotel
        $hotel = Hotel::find($id);
        $hotel->name = $request->input('name');
        $hotel->city = $request->input('city');
        $hotel->address = $request->input('address');
        $hotel->price = $request->input('price');
        $hotel->number_of_empty_rooms = $request->input('numberOfRooms');
        $hotel->description = $request->input('description');
        if($request->hasFile('cover_image')){
            $hotel->cover_image = $fileNameToStore;
        }
        $hotel->save();

        //redirect to hotels with successful note
        return redirect('/hotels')->with('success','Hotel is updated successfully.');
    }


    /**
     * Remove the specified hotel from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get the specified hotel
        $hotel = Hotel::find($id);
        //if there is an image associated with the hotel then delete it
        if($hotel->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$hotel->cover_image);
        }
        //delete hotel
        $hotel->delete();
        //redirect to hotels with successful note
        return redirect('/hotels')->with('success','Hotel is removed successfully.');
    }
}
