@extends('layouts.superadmin.master')

@section('page-title', 'Edit Member')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('member.update', ['id'=>$member->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="">Avatar</label>
                            <input type="file" class="form-control" name="avatar" value="{{old('avatar', $member->avatar)}}">
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name', $member->name)}}">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" value="{{old('email', $member->email)}}">
                        </div>
                        <div class="form-group">
                            <label for="">Contact Number</label>
                            <input type="text" class="form-control" name="contactNo" value="{{old('contactNo', $member->contactNo)}}">
                        </div>
                        <div class="form-group">
                            <label for="">Facebook Url</label>
                            <input type="url" class="form-control" name="facebookUrl" value="{{old('facebookUrl', $member->facebookUrl)}}">
                        </div>
                        <div class="form-group">
                            <label for="">Twitter Url</label>
                            <input type="url" class="form-control" name="twitterUrl" value="{{old('twitterUrl', $member->twitterUrl)}}">
                        </div>
                        <div class="form-group">
                            <label for="">LinkedIn Url</label>
                            <input type="url" class="form-control" name="linkedinUrl" value="{{old('linkedinUrl', $member->linkedinUrl)}}">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{old('description', $member->description)}}</textarea>
                        </div>
                        <input type="submit" value="Ok, Add this!" class="btn btn-sm btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection