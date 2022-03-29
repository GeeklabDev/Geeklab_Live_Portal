@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/student/posts/add" method="POST" class="form-group" enctype="multipart/form-data">
            @csrf
            <div class="post-group">
                <div class="form-group mt-3 make-post">
                    <textarea name="content" id="" placeholder="Ինչ՞ կա մտքիդ {{ Auth::user()['name'] }} ջան"
                              class="md-textarea form-control"></textarea>

                    <i class="fa fa-file" aria-hidden="true">
                        <input class="choose-photo" type="file" name="files[]" multiple>
                    </i>
                </div>


                <div class="form-group mt-3">
                    <button class="btn btn-primary">Post</button>
                </div>
            </div>

        </form>
    </div>
    <section>
        <div class="container">
            <div class="row">
                <!-- begin profile-content -->
                <div class="profile-content">
                    <!-- begin tab-content -->
                    <div class="tab-content p-0">
                        <!-- begin #profile-post tab -->
                        <div class="tab-pane fade active show" id="profile-post">
                            <!-- begin timeline -->
                            <ul class="timeline">
                                @foreach($posts as $post)
                                    <li id="post-{{ $post->id }}">
                                        <!-- begin timeline-time -->
                                        <div class="timeline-time">
                                            {{--                                                <span class="date">today</span>--}}
                                            <span class="time">{{ $post->created_at->format('h:i:s') }}</span>
                                        </div>
                                        <!-- end timeline-time -->
                                        <!-- begin timeline-icon -->
                                        <div class="timeline-icon">
                                            <a href="javascript:;">&nbsp;</a>
                                        </div>
                                        <!-- end timeline-icon -->
                                        <!-- begin timeline-body -->
                                        <div class="timeline-body">
                                            <div class="timeline-header">
                                                <span class="userimage"><img src="{{asset($post->user['avatar'])}}"
                                                                             alt=""></span>
                                                <span class="username"><a
                                                        href="{{ asset('profiles/student/'.$post->user->id)}}">{{ $post->user->name}} {{$post->user->surname}}</a> <small></small></span>
                                            </div>
                                            <div class="timeline-content">
                                                <p class="post-content">
                                                     {{ $post->content }}
                                                </p>
                                                <div class="row">
                                                    @foreach(json_decode($post->images) as $key)
                                                        <img data-lightbox="roadtrip" class="post-img"
                                                             src="{{ asset($key) }}" alt="">
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="timeline-likes">
                                                <div class="stats-right">
                                                    <span
                                                        class="stats-text">{{ $post->number_of_comments() }} Comments</span>
                                                </div>
                                                <div class="stats">
                                                    <span class="fa-stack fa-fw stats-icon">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-thumbs-up fa-stack-1x fa-inverse"></i>
                                    </span>
                                                    <span class="stats-total">{{ $post->number_of_likes() }}</span>
                                                </div>
                                            </div>
                                            <div class="timeline-footer">

                                                @if($post->check_like()==0)
                                                    <a href="/like/add/{{ $post->id }}#post-{{ $post->id }}"
                                                       class="m-lg-2 text-inverse-lighter"><i
                                                            class="fa fa-thumbs-up fa-fw fa-lg m-r-3"></i> Like</a>
                                                @else
                                                    <a href="/like/dislike/{{ $post->id }}#post-{{ $post->id }}"
                                                       class="m-lg-2 text-inverse-lighter"><i
                                                            class="fa fa-thumbs-up fa-fw fa-lg m-r-3"></i> Dislike</a>
                                                @endif
                                                <a href="javascript:;" class="m-lg-2 text-inverse-lighter"><i
                                                        class="fa fa-comments fa-fw fa-lg m-r-3"></i> Comment</a>
                                            </div>

                                            <div class="add-comment-group">
                                                <div class="timeline-comment-box">
                                                    <div class="comments">
                                                        @foreach($post->comments as $key)

                                                            <div class="item-comment">

                                                                <div class="image-avatar">
                                                                    <a href="/profiles/student/{{$key['user']['id']}}">
                                                                        <h6>{{ $key->user->name }} {{$key->user->surname}}</h6>
                                                                    </a>
                                                                </div>
                                                                <div class="item-comment-child">
                                                                    <div class="comment-parent">
                                                                        <p>  {{ $key->comment }}</p>
                                                                    </div>
                                                                    <div class="row">
                                                                        @foreach(json_decode($key->images) as $key)
                                                                            <img style="width: 150px"
                                                                                 src="{{ asset($key) }}" alt="">
                                                                        @endforeach
                                                                    </div>
                                                                    @if(Auth::id()==$key['user_id'])
                                                                        <div class="delete-comment-parent">
                                                                            <a href="/student/delete/comment/{{$key->id}}"><i
                                                                                    class="fa fa-trash"></i></a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="input">
                                                        <form action="/student/comment/add/{{ $post->id }}"
                                                              enctype="multipart/form-data" method="POST">
                                                            @csrf
                                                            <div class="input-group">
                                                                <input type="text" class="form-control rounded-corner"
                                                                       name="comment" placeholder="Write a comment...">
                                                                <div class="comment-file">
                                                                    <i class="fa fa-file" aria-hidden="true">
                                                                        <input type="file" multiple name="files[]"
                                                                               class="choose-photo">
                                                                    </i>
                                                                </div>
                                                                <span class="input-group-btn p-l-10">
                                          <button class="btn btn-primary f-s-12 rounded-corner"
                                                  type="submit"> Comment <i class="fa fa-paper-plane"
                                                                            aria-hidden="true"></i></button>
                                          </span>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="background-zoom">

    </div>
    <div class="zoom-image">
        <img src="" alt="">
    </div>
@endsection

