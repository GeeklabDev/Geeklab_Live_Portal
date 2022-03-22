@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/group/add" method="POST" class="form-group">
            @csrf
            <div class="form-group mt-3">
                <label for="">Group Name</label>
                <input class="form-control" required type="text" name="name" >
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-success">Submit</button>
            </div>

        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <table class="table table-dark table-hover">
            <tr>
                <td>Name</td>
                <td>DELETE</td>
                <td>EDIT</td>
            </tr>
            @foreach($group as $key)
                <tr>
                    <td>{{$key['name']}}</td>
                    <td>
                        <a href="/group/delete/{{$key->id}}"> <button  class="btn btn-danger">Delete</button> </a>
                    </td>
                    <td>
                        <a href="/group/edit/{{$key->id}}"><button  class="btn btn-primary">Edit</button> </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
