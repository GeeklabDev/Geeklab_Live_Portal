@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card p-10  mt-5">
            <h1>Groups</h1>
            <div class="groups-flex row dark">
                @foreach($groupsUsers as $key)
                    <div class="col-12 col-sm-6 col-md-6 mt-5 d-flex align-items-center mb-2 item-group">
                        <img src="https://banner2.cleanpng.com/20180717/cek/kisspng-computer-icons-desktop-wallpaper-team-concept-5b4e0cd3819810.4507019915318417475308.jpg" alt="">
                        <h4>{{ $key['name'] }}</h4>
                        <button class="btn btn-info" data-bs-toggle="modal"  data-bs-target="#myModal-{{ $key->id }}" >Open students</button>
                        <div class="modal" id="myModal-{{ $key->id }}" >
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Modal Heading</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <table class="table">
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Surname</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Send Message</th>
                                            </tr>
                                            @foreach($key['users'] as $keys)
                                            <tr>
                                                <td>{{ $keys['user']['id'] }}</td>
                                                <td>{{ $keys['user']['name'] }}</td>
                                                <td>{{ $keys['user']['surname'] }}</td>
                                                <td>{{ $keys['user']['phone'] }}</td>
                                                <td>{{ $keys['user']['email'] }}</td>
                                                <td>
                                                    <form action="/send/message/{{ $keys['user']['id'] }}" method="POST">
                                                        @csrf
                                                        <input class="form-control" name="message" type="text">
                                                        <button class="btn btn-success mt-2">Send</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" wire:click="update()" class="btn btn-success">Update</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <i  class="fa fa-trash m-lg-2"></i>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
