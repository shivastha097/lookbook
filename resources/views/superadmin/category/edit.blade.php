@extends('layouts.superadmin.master')

@section('page-title', 'Edit Category')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('category.update', ['id'=>$category->id])}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name', $category->name)}}">
                        </div>
                        <div class="form-group">
                            <label for="">Parent Category</label>
                            <select name="parent_id" id="" class="form-control">
                                <option value="">Select</option>
                                @foreach($categories as $cat)
                                    <option value="{{$cat->id}}" {{ $cat->id==$category->parent_id ? 'selected' : '' }}>{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="1" {{$category->status==1 ? 'selected' : ''}}>Active</option>
                                <option value="0" {{$category->status==0 ? 'selected' : ''}}>Inactive</option>
                            </select>
                        </div>
                        <input type="submit" value="Ok, Save changes!" class="btn btn-sm btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection