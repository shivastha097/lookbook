<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Model\Room;
use App\Model\Category;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('seller.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('seller.room.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  =>  'required',
            'featuredImage' =>  'image|mimes:png,jpg,jpeg,svg,bmp',
        ]);
        $room = new Room;
        $room->seller_id = Auth::id();
        $room->name = $request->name;
        $room->city = $request->city;
        $room->address = $request->address;
        $room->category = $request->category;
        $room->rooms = $request->rooms;
        $room->area = $request->area;
        $room->beds = $request->beds;
        $room->price = $request->price;
        $room->status = $request->status;
        $room->description = $request->description;
        if($request->hasFile('featuredImage')) {
            $image = $request->featuredImage;
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('uploads/room/' . $filename);
            Image::make($image->getRealPath())->resize(200, 200)->save($path);
            $room->featuredImage = $filename;
        }
        $room->save();

        Session::flash('msg', 'New Room Added Successfully');
        return redirect()->route('room.index');
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
        $room = Room::findOrFail($id);
        return view('seller.room.edit', compact('room'));
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
        $this->validate($request, [
            'featuredImage' =>  'image|mimes:png,jpg,jpeg,svg,bmp',
            'name'  =>  'required'
        ]);

        $room = Room::findOrFail($id);
        $room->name = $request->name;
        $room->price = $request->price;
        $room->status = $request->status;
        $room->description = $request->description;
        if($request->hasFile('featuredImage')) {
            $image = $request->featuredImage;
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('uploads/room/' . $filename);
            Image::make($image->getRealPath())->resize(200, 200)->save($path);
            $room->featuredImage = $filename;
        }
        $room->save();

        Session::flash('msg', 'Room updated Successfully');
        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $room = Room::findOrFail($request->room_id);
        $room->delete();
        Session::flash('msg', 'Room Deleted Successfully');
        return back();
    }
}
