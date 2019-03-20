<?php

namespace App\Http\Controllers\Superadmin;

use Session;
use App\Model\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return view('superadmin.member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member = new Member;
        $member->name = $request->name;
        $member->contactNo = $request->contactNo;
        $member->email = $request->email;
        $member->facebookUrl = $request->facebookUrl;
        $member->twitterUrl = $request->twitterUrl;
        $member->linkedinUrl = $request->linkedinUrl;
        $member->description = $request->description;
        if($request->hasFile('avatar')) {
            $image = $request->avatar;
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('uploads/member/' . $filename);
            Image::make($image->getRealPath())->resize(350, 392)->save($path);
            $member->avatar = $filename;
        }
        $member->save();

        Session::flash('msg', 'New member added successfully');
        return redirect()->route('member.index');
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
        $member = Member::findOrFail($id);
        return view('superadmin.member.edit', compact('member'));
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
        $member = Member::findOrFail($id);
        $member->name = $request->name;
        $member->contactNo = $request->contactNo;
        $member->email = $request->email;
        $member->facebookUrl = $request->facebookUrl;
        $member->twitterUrl = $request->twitterUrl;
        $member->linkedinUrl = $request->linkedinUrl;
        $member->description = $request->description;
        if($request->hasFile('avatar')) {
            $image = $request->avatar;
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('uploads/member/' . $filename);
            Image::make($image->getRealPath())->resize(350, 392)->save($path);
            $member->avatar = $filename;
        }
        $member->save();

        Session::flash('msg', 'Member updated successfully');
        return redirect()->route('member.index');
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
