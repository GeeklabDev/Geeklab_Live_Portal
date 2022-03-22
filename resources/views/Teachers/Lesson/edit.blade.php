@extends('layouts.app')
@section('content')
    <div class="container">
    <input value="{{$lesson['title']}}" type="text" placeholder="Title" class="form-control" id="title" name="title">
    <div class="editor" contenteditable="true">
        {!! $lesson['content'] !!}
    </div>
    <div class="form-group">
        <select class="form-control" id="group_id" name="group_id" id="">
            <option value="">Select Group</option>
            @foreach($groups as $key)
                <option value="{{ $key->id }}">{{ $key->name }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-success" id="add-lesson">Add</button>

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
    <script>
        let editor = document.querySelector('.editor');
        let lessonBtn = document.getElementById('add-lesson');
        let title = document.getElementById('title');
        let group_id = document.getElementById('group_id');
        lessonBtn.onclick=()=>{
            $.ajax({
                type:"POST",
                cache:false,
                url:"/lesson/update/{{ $lesson['id'] }}",
                data: {_token:'{{ csrf_token() }}', content:editor.innerHTML, group_id:group_id.value, title:title.value},
                success: function (html) {
                    window.location='/lesson';
                }
            });
        }
    </script>
@endsection
