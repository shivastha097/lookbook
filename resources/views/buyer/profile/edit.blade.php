@extends('layouts.buyer.master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                @include('layouts.buyer.snippets.errors')
                <div class="col-12">
                    <form action="{{route('buyer.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name', $profile->user->name)}}">
                        </div>
                        <div class="form-group">
                            <label for="">Profile Image</label>
                            <input type="file" class="form-control" name="avatar" value="{{ old('avatar', $profile->avatar) }}">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email', $profile->user->email) }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address', $profile->address) }}">
                        </div>
                        <div class="form-group">
                            <label for="">Contact No.</label>
                            <input type="text" class="form-control" name="contactNo" value="{{ old('contactNo', $profile->contactNo) }}">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="10">{{ old('description', $profile->description) }}</textarea>
                        </div>
                        <input type="submit" value="Save changes" class="btn btn-sm btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection