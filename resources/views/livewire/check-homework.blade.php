<div>
    <div class="container">
        <table class="table table-dark table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Lesson title</th>
                <th>GROUP NAME</th>
                <th>Rating</th>
                <th>Message</th>
                <th>Rating open</th>
            </tr>
            </thead>
            <tbody  id="table">
            @foreach($homeworks as $key)
                   @if($key['lesson']['group']['user_id']==Auth::id())
                    <tr>
                        <td>{{ $key->id }}</td>
                        <td>{{ $key['lesson']['title'] }}</td>
                        <td>{{ $key['lesson']['group']['name'] }}</td>
                        <td>{{ $key['rating'] }}</td>
                        <td>{{ $key['message'] }}</td>
                        <td><button   data-bs-toggle="modal"  data-bs-target="#myModal-{{ $key->id }}"  class="btn btn-info">Open rating</button></td>
                        <div class="modal" id="myModal-{{ $key->id }}" >
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Modal Heading</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <form action="/update/rating/{{ $key->id }}" method="POST">
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Rating</label>
                                                <input type="text" value="{{ $key->rating }}"  name="rating" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Message</label>
                                                <input type="text"  value="{{ $key->message }}" name="message" class="form-control">
                                            </div>
                                        </div>
                                        @csrf
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Update</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </tr>
                    @endif
            @endforeach
            </tbody>
        </table>
    </div>
</div>
