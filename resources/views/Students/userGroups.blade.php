@extends('layouts.app')
@section('content')

    <div class="container">
        <form action="user/groups" method="POST"></form>
        <h1>Group</h1>
        <ul>
            @foreach($groups as $key)
                <a href="/user/lessons/{{ $key['group']["id"] }}"><li class="list-group">{{ $key['group']['name'] }}</li></a>
            @endforeach
        </ul>
    </div>


    @endsection
