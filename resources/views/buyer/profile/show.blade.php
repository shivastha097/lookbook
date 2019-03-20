@extends('layouts.buyer.master')

@section('page-title', 'Profile')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <a href="{{route('buyer.edit')}}" class="btn btn-sm btn-primary float-right">Edit Profile</a>
                    </div>
                    @include('layouts.buyer.snippets.message')
                    <div class="col-12 mt-5">
                        <div class="row">
                            <div class="col-4 text-center">
                                <img src="{{asset("uploads/buyer/$profile->avatar")}}" alt="Avatar" height="150" width="150">
                            </div>
                            <div class="col-8">
                                <table class="table">
                                    <tr>
                                        <th>Name</th>
                                        <td>{{$profile->user->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$profile->user->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{$profile->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact No.</th>
                                        <td>{{$profile->contactNo}}</td>
                                    </tr>
                                    <tr>
                                        <th>About Me</th>
                                        <td>{!! $profile->description !!}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection