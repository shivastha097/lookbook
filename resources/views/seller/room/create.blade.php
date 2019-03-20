@extends('layouts.seller.master')

@section('page-title', 'Add Room')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('room.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Featured Image</label>
                            <input type="file" name="featuredImage" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category" id="" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->name}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">City</label>
                            <input type="text" class="form-control" name="city">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        <div class="form-group">
                            <label for="">Area of House/Room</label>
                            <input type="text" class="form-control" name="area">
                        </div>
                        <div class="form-group">
                            <label for="">No. of Rooms</label>
                            <input type="text" class="form-control" name="rooms">
                        </div>
                        <div class="form-group">
                            <label for="">No. of Beds</label>
                            <input type="text" class="form-control" name="beds">
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" class="form-control" name="price">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-sm btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection