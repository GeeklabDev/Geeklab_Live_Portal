@extends('layouts.app')
@section('content')
    <div class="container">
        <input type="text" placeholder="Title" class="form-control" id="title">
        <div class="editor" contenteditable="true">
        </div>
        <div class="form-group">
            <select class="form-control" id="group_id" name="" id="">
                <option value="">Select Group</option>
                @foreach($groups as $key)
                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success" id="add-lesson">Add</button>
        @foreach($groups as $key)
            <a href="/lesson/search/{{ $key->id }}">{{ $key->name }}</a>
        @endforeach

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
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>GROUP NAME</th>
                    <th>DELETE</th>
                    <th>EDIT</th>
                </tr>
            </thead>
            <tbody  id="table">
                @foreach($lessons as $key)
                    @if($key['group']!=null)
                        <tr>
                            <td>{{ $key->id }}</td>
                            <td>{{ $key->title }}</td>
                            <td>{{ $key['group']['name'] }}</td>
                            <td><a href="lesson/delete/{{ $key->id }}"><button class="btn btn-danger">Delete</button></a></td>
                            <td><a href="lesson/edit/{{ $key->id }}"><button class="btn btn-info">Edit</button></a></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        let editor = document.querySelector('.editor');
        let lessonBtn = document.getElementById('add-lesson');
        let title = document.getElementById('title');
        let group_id = document.getElementById('group_id');
        lessonBtn.onclick=()=>{
            $.ajax({
                type:"POST",
                cache:false,
                url:"lesson/add",
                data: {_token:'{{ csrf_token() }}', content:editor.innerHTML, group_id:group_id.value, title:title.value},
                success: function (html) {
                    // location.reload();
                    let lesson = html.lesson;
                    $('#table').prepend(`
                        <tr>
                            <td>${lesson.id}</td>
                            <td>${lesson.title}</td>
                            <td>${lesson.group_id}</td>
                            <td><a href="lesson/delete/${lesson.id}"><button class="btn btn-danger">Delete</button></a></td>
                            <td><a href="lesson/edit/${lesson.id}"><button class="btn btn-info">Edit</button></a></td>
                        </tr>
                    `)
                }
            });
        }
    </script>
@endsection
