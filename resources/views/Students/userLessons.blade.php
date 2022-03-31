@extends('layouts.app')
@section('content')

    <div class="container">
        <form action="/user/lessons/" method="POST">
        <h1>Lessons</h1>
             @foreach($lessons as $key)
                 <h1>{{ $key->title }}</h1>
                 <div class="content-lesson">{!! $key->content !!}</div>
             @endforeach
            <div class="pagination">
                {{ $lessons->links() }}
            </div>
        </form>
    </div>


@endsection
