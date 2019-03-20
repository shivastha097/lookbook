@extends('layouts.superadmin.master')

@section('page-title', 'Show Buyer Profile')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12" style="border-bottom:1px solid #343A40">
                        <h5><b>{{$buyer->user->name}}'s Details</b></h5>
                    </div>
                    
                    <div class="col-12 mt-5">
                        <div class="row">
                            <div class="col-4 text-center">
                                <img src="{{asset("uploads/buyer/$buyer->avatar")}}" alt="buyer image" height="150" width="150">
                            </div>
                            <div class="col-8">
                                <table class="table">
                                    <tr>
                                        <th>Name</th>
                                        <td>{{$buyer->user->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$buyer->user->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{$buyer->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact No.</th>
                                        <td>{{$buyer->contactNo}}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{!! $buyer->description !!}</td>
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