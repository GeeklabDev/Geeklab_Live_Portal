@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/group/update/{{$group->id}}" method="POST" >
            @csrf
            <div class="form-group">
                <label for="">Group Name</label>
                <input class="form-control"  value="{{$group->name}}" name="name" >
            </div>

            <button class="btn btn-success">Update</button>

        </form>
    </div>
@endsection
