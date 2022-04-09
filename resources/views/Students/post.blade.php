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
                    <button class="btn btn-primary">Տեղադրել</button>
                </div>
            </div>

        </form>
    </div>
    @livewireStyles
    <livewire:posts/>
    @livewireScripts
    <div class="background-zoom">

    </div>
    <div class="zoom-image">
        <img src="" alt="">
    </div>
@endsection

