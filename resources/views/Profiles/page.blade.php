@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="content" class="content content-full-width">
                    <!-- begin profile -->
                    <div class="profile">
                        <div class="profile-header">
                            <!-- BEGIN profile-header-cover -->
                            <div class="profile-header-cover"></div>
                            <!-- END profile-header-cover -->
                            <!-- BEGIN profile-header-content -->
                            <div class="profile-header-content">
                                <!-- BEGIN profile-header-img -->
                                <div class="profile-header-img">
                                    <div name="file" class="avatar">
                                        @if(\Illuminate\Support\Facades\Auth::user()['avatar']=='')
                                            <div class="profile-avatar">
                                                <img  src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                            </div>
                                        @else
                                            <div class="profile-avatar">
                                                <img  src="{{asset(Auth::user()->avatar)}}">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- END profile-header-img -->
                                <!-- BEGIN profile-header-info -->
                                <div class="profile-header-info">
                                    <h4 class="m-t-10 m-b-5">{{$user['name']}} {{$user['surname']}}</h4>
                                    <p class="m-b-10">Laravel yevs</p>
                                    @if($user->id==\Illuminate\Support\Facades\Auth::id())
                                        <a href="/profiles/edit/" class="btn btn-sm btn-info mb-2">Edit Profile</a>

                                    @endif
                                </div>
                                <!-- END profile-header-info -->
                            </div>
                            <!-- END profile-header-content -->
                            <!-- BEGIN profile-header-tab -->
                            <ul class="profile-header-tab nav nav-tabs">
                                <li class="nav-item"><a href="#profile-post" class="nav-link active show"
                                                        data-toggle="tab">POSTS</a></li>
                                <li class="nav-item"><a href="#profile-about" class="nav-link"
                                                        data-toggle="tab">My Groups</a></li>
                                <li class="nav-item"><a href="#profile-photos" class="nav-link"
                                                        data-toggle="tab">PHOTOS</a></li>
                                <li class="nav-item"><a href="#profile-videos" class="nav-link"
                                                        data-toggle="tab">VIDEOS</a></li>
                                <li class="nav-item"><a href="#profile-friends" class="nav-link" data-toggle="tab">FRIENDS</a>
                                </li>
                            </ul>
                            <!-- END profile-header-tab -->
                        </div>
                    </div>
                    <!-- end profile -->
                    <!-- begin profile-content -->
                    @livewireStyles
                    <livewire:posts/>
                    @livewireScripts
                    <!-- end profile-content -->
                </div>
            </div>
        </div>
    </div>
@endsection
