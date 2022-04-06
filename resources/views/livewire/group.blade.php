<div class="container">
    <form wire:submit.prevent="save">
        @csrf
        <div class="form-group mt-3">
            <label for="">Group Name</label>
            <input class="form-control" required type="text" wire:model="name" >
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


{{--    <table class="table table-dark table-hover">--}}
{{--        <tr>--}}
{{--            <td>Name</td>--}}
{{--            <td>DELETE</td>--}}
{{--            <td>EDIT</td>--}}
{{--        </tr>--}}
{{--        @foreach($group as $key)--}}
{{--            <tr>--}}
{{--                <td>{{$key['name']}}</td>--}}
{{--                <td>--}}
{{--                   <button wire:click="delete({{ $key->id }})"  class="btn btn-danger">Delete</button>--}}
{{--                </td>--}}
{{--                <td>--}}
{{--                    <button   data-bs-toggle="modal" data-bs-target="#myModal" wire:click="edit({{ $key->id }})"  class="btn btn-primary">Edit</button>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--    </table>--}}

    <div class="card p-10  mt-5" wire:pull>
        <h1>Groups</h1>
        <div class="groups-flex row dark">
          @foreach($group as $key)
            <div class="col-12 col-sm-6 col-md-6 mt-5 d-flex align-items-center mb-2 item-group">
                <img src="https://banner2.cleanpng.com/20180717/cek/kisspng-computer-icons-desktop-wallpaper-team-concept-5b4e0cd3819810.4507019915318417475308.jpg" alt="">
                <h4>{{ $key['name'] }}</h4>
                <i wire:click="delete({{ $key->id }})"  class="fa fa-trash m-lg-2"></i>
            </div>
           @endforeach
        </div>
    </div>
</div>
<div class="container">
    <div class="modal" id="myModal" >
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text"  wire:model="updatedName" class="form-control">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" wire:click="update()" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

</div>
