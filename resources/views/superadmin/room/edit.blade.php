@extends('layouts.superadmin.master')

@section('page-title', 'Edit Room')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('superadmin.room.update', ['id'=>$room->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Featured Image</label>
                            <input type="file" name="featuredImage" class="form-control" value="{{old('featuredImage', $room->featuredImage)}}">
                        </div>
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="name" value="{{old('name', $room->name)}}">
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" class="form-control" name="price" value="{{old('price', $room->price)}}">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{old('description', $room->description)}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="2" {{$room->status==2 ? 'selected' : ''}}>Active</option>
                                <option value="1" {{$room->status==0 ? 'selected' : ''}}>Pending</option>
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