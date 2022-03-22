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
                    <div class="profile-content">
                        <!-- begin tab-content -->
                        <div class="tab-content p-0">
                            <!-- begin #profile-post tab -->
                            <div class="tab-pane fade active show" id="profile-post">
                                <!-- begin timeline -->
                                <ul class="timeline">
                                    <li>
                                        <!-- begin timeline-time -->
                                        <div class="timeline-time">
                                            <span class="date">today</span>
                                            <span class="time">04:20</span>
                                        </div>
                                        <!-- end timeline-time -->
                                        <!-- begin timeline-icon -->
                                        <div class="timeline-icon">
                                            <a href="javascript:;">&nbsp;</a>
                                        </div>
                                        <!-- end timeline-icon -->
                                        <!-- begin timeline-body -->
                                        @foreach($user->posts as $post)
                                        <div class="timeline-body">
                                            <div class="timeline-header">
                                                <div class="parent_user">
                                                    @if(\Illuminate\Support\Facades\Auth::user()['avatar']=='')

                                                        <div class="avatar-parent">
                                                            <img  src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                                        </div>

                                                    @else
                                                        <div class="avatar-parent">
                                                          <img  src="{{asset(Auth::user()->avatar)}}">
                                                        </div>

                                                    @endif
                                                    <span class="username"><a
                                                            href="">{{ $user['name'].' '.$user['surname'] }}</a> <small></small>
                                                    </span>
                                                </div>

                                            </div>
                                            <div class="timeline-content">

                                                <span>
                                                    {{$post->content}}
                                                </span>
                                            </div>
                                            <div class="timeline-likes">
                                                <div class="stats-right">
                                                    <span class="stats-text">21 Comments</span>
                                                </div>
                                                <div class="stats">
                                    <span class="fa-stack fa-fw stats-icon">
                                    <i class="fa fa-circle fa-stack-2x text-danger"></i>
                                    <i class="fa fa-heart fa-stack-1x fa-inverse t-plus-1"></i>
                                    </span>
                                                    <span class="fa-stack fa-fw stats-icon">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-thumbs-up fa-stack-1x fa-inverse"></i>
                                    </span>
                                                    <span class="stats-total">4.3k</span>
                                                </div>
                                            </div>
                                            <div class="timeline-footer">
                                                <a href="#" class="m-lg-2 text-inverse-lighter"><i
                                                        class="fa fa-thumbs-up fa-fw fa-lg m-r-3"></i> Like</a>
                                                <a href="#" class="m-lg-2 text-inverse-lighter"><i
                                                        class="fa fa-comments fa-fw fa-lg m-r-3"></i> Comment</a>
                                            </div>
                                            <div class="timeline-comment-box">
                                                <div class="comments">
                                                    @foreach($post->comments as $key)
                                                        <div class="item-comment">
                                                            <div class="image-avatar">
                                                                <a href="/profiles/student/{{$key['user']['id']}}">  <h6>{{ $key->user->name }} {{$key->user->surname}}</h6></a>
                                                            </div>
                                                            <div class="comment-parent">
                                                                <p> {{ $key->comment }}</p>
                                                            </div>
                                                            <div class="row">
                                                                @foreach(json_decode($key->images) as $key)
                                                                    <img style="width: 150px" src="{{ asset($key) }}" alt="">
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="user"><img
                                                        src="https://bootdey.com/img/Content/avatar/avatar3.png">
                                                </div>
                                                <div class="input">
                                                    <form action="/student/comment/add/{{ $post->id }}" enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        <div class="input-group">
                                                            <input type="text" class="form-control rounded-corner" placeholder="Write a comment..." name="comment">
                                                            <div class="comment-file">
                                                                <i class="fa fa-file" aria-hidden="true">
                                                                    <input type="file" multiple name="files[]" class="choose-photo">
                                                                </i>
                                                            </div>
                                                            <span class="input-group-btn p-l-10">
                                                          <button class="btn btn-primary f-s-12 rounded-corner" type="submit">Comment</button>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                        <!-- end timeline-body -->
                                    </li>
                                </ul>
                                <!-- end timeline -->
                            </div>
                            <!-- end #profile-post tab -->
                        </div>
                        <!-- end tab-content -->
                    </div>
                    <!-- end profile-content -->
                </div>
            </div>
        </div>
    </div>
@endsection
