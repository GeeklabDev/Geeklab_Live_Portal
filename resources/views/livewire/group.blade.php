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
                   <button wire:click="delete({{ $key->id }})"  class="btn btn-danger">Delete</button>
                </td>
                <td>
                    <button   data-bs-toggle="modal" data-bs-target="#myModal" wire:click="edit({{ $key->id }})"  class="btn btn-primary">Edit</button>
                </td>
            </tr>
        @endforeach
    </table>
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
