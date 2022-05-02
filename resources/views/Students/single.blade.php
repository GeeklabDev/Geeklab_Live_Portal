@extends('layouts.app')
@section('content')

    <div class="container">
            <h1>{{ $lesson->title }}</h1>
            <div class="content-lesson mt-5 mb-5">{!! $lesson->content !!}</div>
            @livewireStyles
            <livewire:homwork ids="{{ $lesson->id }}"/>
            @livewireScripts
    </div>


@endsection
