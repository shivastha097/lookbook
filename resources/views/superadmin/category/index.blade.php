@extends('layouts.superadmin.master')

@section('page-title', 'All Categories')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('category.create')}}" class="btn btn-sm btn-primary float-right">Add New Category</a>
                </div>
                <hr>
                @include('layouts.superadmin.snippets.message')
                <div class="col-lg-12 mt-3">
                    <table class="table">
                        <thead>
                            <th>S.N</th>
                            <th>Name</th>
                            <th>Parent Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @if(count($categories) > 0)
                                @foreach($categories as $key=>$category)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->parent['name']}}</td>
                                        <td>{{$category->status==1 ? 'Active' : 'Inactive'}}</td>
                                        <td>
                                            <a href="{{route('category.edit', ['id'=>$category->id])}}" class="btn btn-sm btn-primary">Edit</a>

                                            <a href="" class="btn btn-sm btn-danger" data-category_id="{{$category->id}}" data-toggle="modal" data-target="#deleteCategory">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">No categories available</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
</div>
<!-- Delete Model -->
<div class="modal fade modal-danger" id="deleteCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog model-sm" role="document">
	    <div class="modal-content">
	        <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Delete Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
	        </div>
	    
            <form action="{{route('category.destroy','category')}}" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <p class="text-center">
                        Are you sure you want to delete this?
                    </p>
                    <input type="hidden" name="category_id" id="category_id" value="">
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </div>
            </form>
	    </div>
	</div>
</div>
@endsection

@section('scripts')
    <script>
        $('#deleteCategory').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var cat_id = button.data('category_id')
        var modal = $(this)
        modal.find('.modal-body #category_id').val(cat_id);
        });
    </script>
@endsection
