@extends('layouts.app')
@section('content')

    <div class="container">
            <div class="cards-dashboard">
                @foreach($groups as $key)

                        <div class="card-dashboard">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <a href="/user/lessons/{{ $key['group']["id"] }}"><h3>{{ $key['group']['name'] }}</h3> </a>
                            <a href="/student/syllabus/{{ $key['group']["id"] }}">
                                <h6>Ուս․ ծրագիր</h6>
                            </a>
                        </div>

                @endforeach
            </div>
        </div>


    @endsection
