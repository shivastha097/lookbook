@extends('layouts.superadmin.master')

@section('page-title', 'Show Seller Profile')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12" style="border-bottom:1px solid #343A40">
                        <h5><b>{{$seller->user->name}}'s Details</b></h5>
                    </div>
                    
                    <div class="col-12 mt-5">
                        <div class="row">
                            <div class="col-4 text-center">
                                <img src="{{asset("uploads/seller/$seller->avatar")}}" alt="Seller image" height="150" width="150">
                            </div>
                            <div class="col-8">
                                <table class="table">
                                    <tr>
                                        <th>Name</th>
                                        <td>{{$seller->user->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$seller->user->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{$seller->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact No.</th>
                                        <td>{{$seller->contactNo}}</td>
                                    </tr>
                                    <tr>
                                        <th>About Me</th>
                                        <td>{!! $seller->description !!}</td>
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