@extends('layouts.superadmin.master')

@section('page-title', 'All Members')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('member.create')}}" class="btn btn-sm btn-primary float-right">Add New member</a>
                </div>
                <hr>
                @include('layouts.superadmin.snippets.message')
                <div class="col-lg-12 mt-3">
                    <table class="table">
                        <thead>
                            <th>S.N</th>
                            <th>Image</th>
                            <th>Member Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @if(count($members) > 0)
                                @foreach($members as $key=>$member)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <img src="{{asset("uploads/member/$member->avatar")}}" alt="" height="50" width="50">
                                        </td>
                                        <td>{{$member->name}}</td>
                                        <td>{{$member->email}}</td>
                                        <td>{{$member->contactNo}}</td>
                                        <td>
                                            <a href="{{route('member.show', ['id'=>$member->id])}}" class="btn btn-sm btn-secondary">View</a>

                                            <a href="{{route('member.edit', ['id'=>$member->id])}}" class="btn btn-sm btn-primary">Edit</a>

                                            <a href="" class="btn btn-sm btn-danger" data-member_id="{{$member->id}}" data-toggle="modal" data-target="#deletemember">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">No members available</td>
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
<div class="modal fade modal-danger" id="deletemember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog model-sm" role="document">
	    <div class="modal-content">
	        <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Delete member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
	        </div>
	    
            <form action="{{route('member.destroy','member')}}" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <p class="text-center">
                        Are you sure you want to delete this?
                    </p>
                    <input type="hidden" name="member_id" id="member_id" value="">
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
        $('#deletemember').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var cat_id = button.data('member_id')
        var modal = $(this)
        modal.find('.modal-body #member_id').val(cat_id);
        });
    </script>
@endsection
