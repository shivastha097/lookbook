<?php

namespace App\Http\Controllers\Seller;

use Auth;
use Session;
use App\User;
use App\Model\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class SellerController extends Controller
{
    public function dashboard()
    {
        return view('seller.index');
    }

    public function show()
    {
        $user_id = Auth::id();
        $profile = Seller::where('user_id',$user_id)->first();
        return view('seller.profile.show', compact('profile'));
    }

    public function edit()
    {
        $user_id = Auth::id();
        $profile = Seller::where('user_id',$user_id)->first();
        return view('seller.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name'  =>  'required',
            'avatar'    =>  'required|image|mimes:png,img,jpg,jpeg,svg,bmp',
            'email' =>  'required'
        ]);

        $user_id = Auth::id();
        $profile = Seller::where('user_id', $user_id)->first();
        $profile->name = $request->name;
        $profile->address = $request->address;
        $profile->contactNo = $request->contactNo;
        $profile->description = $request->description;
        if($request->hasFile('avatar')) {
            $image = $request->avatar;
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('uploads/seller/' . $filename);
            Image::make($image->getRealPath())->resize(200, 200)->save($path);
            $profile->avatar = $filename;
        }
        $profile->save();

        Session::flash('msg', 'Profile updated successfully');
        return redirect()->route('seller.profile');
    }
}
