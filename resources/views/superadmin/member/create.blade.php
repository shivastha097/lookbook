@extends('layouts.superadmin.master')

@section('page-title', 'Add New Member')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('member.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Avatar</label>
                            <input type="file" class="form-control" name="avatar">
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Contact Number</label>
                            <input type="text" class="form-control" name="contactNo">
                        </div>
                        <div class="form-group">
                            <label for="">Facebook Url</label>
                            <input type="url" class="form-control" name="facebookUrl">
                        </div>
                        <div class="form-group">
                            <label for="">Twitter Url</label>
                            <input type="url" class="form-control" name="twitterUrl">
                        </div>
                        <div class="form-group">
                            <label for="">LinkedIn Url</label>
                            <input type="url" class="form-control" name="linkedinUrl">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <input type="submit" value="Ok, Add this!" class="btn btn-sm btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection