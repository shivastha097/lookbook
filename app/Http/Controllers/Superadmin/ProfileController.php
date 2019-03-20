<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use Session;
use App\SuperAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function show()
    {
        $id = auth()->id();
        $profile = SuperAdmin::find($id);
        return view('superadmin.profile.show', compact('profile'));
    }

    public function edit()
    {
        $id = auth()->id();
        $profile = SuperAdmin::findOrFail($id);
        return view('superadmin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name'  =>  'required',
            'avatar'    =>  'image|mimes:png,img,jpg,jpeg,svg,bmp',
            'email' =>  'required'
        ]);

        $user_id = Auth::id();
        $profile = SuperAdmin::findOrFail($user_id);
        $profile->name = $request->name;
        $profile->address = $request->address;
        $profile->contactNo = $request->contactNo;
        $profile->description = $request->description;
        if($request->hasFile('avatar')) {
            $image = $request->avatar;
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('uploads/superadmin/' . $filename);
            Image::make($image->getRealPath())->resize(200, 200)->save($path);
            $profile->avatar = $filename;
        }
        $profile->save();

        Session::flash('msg', 'Profile updated successfully');
        return redirect()->route('superadmin.profile');
    }
}
