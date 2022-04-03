@extends('layouts.app')
@section('content')

    <div class="container">

             @foreach($lessons as $key)
                 <h1>{{ $key->title }}</h1>
                 <div class="content-lesson mt-5 mb-5">{!! $key->content !!}</div>
                    @livewireStyles
                    <livewire:homwork ids="{{ $key->id }}"/>
                    @livewireScripts
             @endforeach
            <div class="pagination">
                {{ $lessons->links() }}
            </div>
    </div>


@endsection
