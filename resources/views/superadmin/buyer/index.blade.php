@extends('layouts.superadmin.master')

@section('page-title', 'All Buyers')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <!-- <div class="col-md-12">
                    <a href="{{route('buyer.create')}}" class="btn btn-sm btn-primary float-right">Add New buyer</a>
                </div> -->
                <hr>
                @include('layouts.superadmin.snippets.message')
                <div class="col-lg-12 mt-3">
                    <table class="table">
                        <thead>
                            <th>S.N</th>
                            <th>Image</th>
                            <th>Buyer Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>No. of Rooms</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @if(count($buyers) > 0)
                                @foreach($buyers as $key=>$buyer)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <img src="{{asset("uploads/buyer/$buyer->avatar")}}" alt="" height="50" width="50">
                                        </td>
                                        <td>{{$buyer->user['name']}}</td>
                                        <td>{{$buyer->user['email']}}</td>
                                        <td>{{$buyer->contactNo}}</td>
                                        <td>{{$buyer->address}}</td>
                                        <td>no. of rooms</td>
                                        <td>
                                            <a href="{{route('buyer.show', ['id'=>$buyer->id])}}" class="btn btn-sm btn-secondary">View</a>

                                            <!-- <a href="{{route('buyer.edit', ['id'=>$buyer->id])}}" class="btn btn-sm btn-primary">Edit</a> -->

                                            <!-- <a href="" class="btn btn-sm btn-danger" data-buyer_id="{{$buyer->id}}" data-toggle="modal" data-target="#deletebuyer">Delete</a> -->
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">No buyers available</td>
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
<div class="modal fade modal-danger" id="deletebuyer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog model-sm" role="document">
	    <div class="modal-content">
	        <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Delete buyer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
	        </div>
	    
            <form action="{{route('buyer.destroy','buyer')}}" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <p class="text-center">
                        Are you sure you want to delete this?
                    </p>
                    <input type="hidden" name="buyer_id" id="buyer_id" value="">
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
        $('#deletebuyer').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var cat_id = button.data('buyer_id')
        var modal = $(this)
        modal.find('.modal-body #buyer_id').val(cat_id);
        });
    </script>
@endsection
