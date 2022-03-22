@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="groupUsers/add" method="POST">
            <input type="text" placeholder="User email" class="form-control" name="email" id="title">
            @csrf
            <div class="form-group">
                <select class="form-control" name="group_id" id="">
                    <option value="">Select Group</option>
                    @foreach($groups as $key)
                        <option value="{{ $key->id }}">{{ $key->name }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success" id="add-lesson">Add</button>

        </form>
        @foreach($groups as $key)
            <a href="/groupUsers/search/{{ $key->id }}">{{ $key->name }}</a>
        @endforeach
        <table class="table table-dark">
            <tr>
                <th>ID</th>
                <th>USER NAME</th>
                <th>GROUP NAME</th>
            </tr>
            @foreach($groupUsers as $key)
                <tr>
                    <td>{{ $key['id'] }}</td>
                    <td>{{ $key['user']['name'] }}</td>
                    <td>{{ $key['group']['name'] }}</td>
                </tr>
            @endforeach
        </table>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
    <div class="container">
    </div>

@endsection
