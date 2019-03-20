@extends('layouts.seller.master')

@section('page-title', 'All Rooms')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('room.create')}}" class="btn btn-sm btn-primary float-right">Add New Room</a>
                </div>
                @include('layouts.seller.snippets.message')
                <div class="col-12 mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>S.N</td>
                                <td>Image</td> 
                                <td>Title</td>
                                <td>Price</td>
                                <td>Posted At</td>
                                <td>Status</td>
                                <td>Description</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($rooms)>0)
                                @foreach($rooms as $key=>$room)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <img src="{{asset("uploads/room/$room->featuredImage")}}" alt="Room image" height="80" width="100">
                                        </td>
                                        <td>{{$room->name}}</td>
                                        <td>{{$room->price}}</td>
                                        <td>{{$room->created_at->toFormattedDateString()}}</td>
                                        <td>{{$room->status==2 ? 'Active' : 'Pending' }}</td>
                                        <td>{{$room->description}}</td>
                                        <td>
                                            <a href="{{route('room.show', ['id'=>$room->id])}}" class="btn btn-sm d-block btn-secondary">View</a>

                                            <a href="{{route('room.edit', ['id'=>$room->id])}}" class="btn btn-sm d-block btn-primary my-1">Edit</a>

                                            <a href="" data-room_id="{{$room->id}}" data-toggle="modal" data-target="#deleteRoom" class="btn btn-sm d-block btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">No rooms available</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Model -->
<div class="modal fade modal-danger" id="deleteRoom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog model-sm" role="document">
	    <div class="modal-content">
	        <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Delete Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
	        </div>
	    
            <form action="{{route('room.destroy','room')}}" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <p class="text-center">
                        Are you sure you want to delete this?
                    </p>
                    <input type="hidden" name="room_id" id="room_id" value="">
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
        $('#deleteRoom').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var room_id = button.data('room_id')
        var modal = $(this)
        modal.find('.modal-body #room_id').val(room_id);
        });
    </script>
@endsection