@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card p-10  mt-5">
            <h1>My Groups</h1>
            <div class="groups-flex row dark">
                @foreach($groups as $key)
                    <a href="/user/lessons/{{ $key['group']["id"] }}">
                    <div class="col-12 col-sm-6 col-md-6 mt-5 d-flex align-items-center mb-2 item-group">
                        <img src="https://banner2.cleanpng.com/20180717/cek/kisspng-computer-icons-desktop-wallpaper-team-concept-5b4e0cd3819810.4507019915318417475308.jpg" alt="">
                        <div>
                            <h4>{{ $key['group']['name'] }}</h4>
                        </div>
                    </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    </div>


    @endsection
