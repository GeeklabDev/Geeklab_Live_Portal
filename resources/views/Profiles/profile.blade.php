@extends('layouts.app')
@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <form action="/teacher/profiles/update/{{ Auth::id()}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div name="photo" class="photo col-md-3">

                    <div class="user-image">

                        <div class="user-image-parent">
                            <div class="choose-user-file">
                                <input type="file" name="avatar" title="Change photo">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::user()['avatar']=='')
                                <img
                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                            @else
                                <img src="{{asset(Auth::user()->avatar)}}">
                            @endif

                        </div>

                    </div>

                    <div class="info-user">
                        <span class="font-weight-bold">{{Auth::user()->name}}</span>
                        <span class="text-black-50">{{Auth::user()->email}}</span>

                    </div>


                </div>


                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" name="name" placeholder="first name" value="{{Auth::user()->name}}"></div>
                            <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" name="surname" value="{{Auth::user()->surname}}" placeholder="surname"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" name="phone" placeholder="enter phone number" value="{{Auth::user()->phone}}"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" name="country" placeholder="country" value="{{Auth::user()->country}}"></div>
                            <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" name="state" value="{{Auth::user()->state}}" placeholder="state"></div>
                        </div>

                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                        <div class="mt-5 text-center"> <a href="/delete/picture/"><button class="btn btn-danger" type="button">Delete Profile picture</button></a></div>
                    </div>
                </div>
            </div>
        </form>


    </div>
    </div>
@endsection

