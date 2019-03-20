@extends('layouts.superadmin.master')

@section('page-title', 'Create Category')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('category.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Parent Category</label>
                            <select name="parent_id" id="" class="form-control">
                                <option value="">Select</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <input type="submit" value="Ok, Add this!" class="btn btn-sm btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection