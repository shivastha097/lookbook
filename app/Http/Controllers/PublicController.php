<?php

namespace App\Http\Controllers;

use App\Model\Room;
use App\Model\Seller;
use App\Model\Member;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $members = Member::all();
        $rooms = Room::all();
        return view('public.index', compact('rooms', 'members'));
    }

    public function property_all()
    {
        $rooms = Room::all();
        return view('public.properties', compact('rooms'));
    }

    public function property_single($id)
    {
        $room = Room::findOrFail($id);
        $seller = Seller::where('user_id', $room->seller_id)->first();
        return view('public.propertysingle', compact('room', 'seller'));
    }

    public function about_us()
    {
        $members = Member::all();
        return view('public.about',compact('members'));
    }
}
