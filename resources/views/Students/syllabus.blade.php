@extends('layouts.app')
@section('content')
    <div class="container">
        <ul class="list-group">
            @foreach($lessons as $key)
                <a href="/student/lesson/{{ $key->id }}">
                    <li class="item-syllabus mt-2 list-group-item {{ $key->isHomework() >= 1 ? "list-group-item-success" : "list-group-item-danger" }}">
                        {{ $key->title }} <span>Գնահատ․՝ {{ $key->rating() }} բալ</span></li>
                </a>
            @endforeach
        </ul>
    </div>
@endsection
