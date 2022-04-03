<div class="container">
    <form wire:submit.prevent="save">
        @csrf
        <input type="text" placeholder="User email" class="form-control" wire:model="email" name="email" id="title">
        @csrf
        <div class="form-group">
            <select class="form-control" wire:model="group_id" name="group_id" id="">
                <option value="">Select Group</option>
                @foreach($groups as $key)
                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                @endforeach
            </select>
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

    <ul class="student lessons">
        @foreach($groups as $key)
            <li class="student-item lessons-item">
                <a href="/groupUsers/search/{{ $key->id }}">{{ $key->name }}</a>
            </li>
        @endforeach
    </ul>

    <div class="card p-10  mt-5">
        <h1>Groups</h1>
        <div class="groups-flex row dark">
            @foreach($groupUsers as $key)
                <div class="col-12 col-sm-6 col-md-6 mt-5 d-flex align-items-center mb-2 item-group">
                    <img src="https://banner2.cleanpng.com/20180717/cek/kisspng-computer-icons-desktop-wallpaper-team-concept-5b4e0cd3819810.4507019915318417475308.jpg" alt="">
                   <div>
                       <h4>{{ $key['group']['name'] }}</h4>
                       <h5>{{ $key['user']['name'] }}</h5>
                       <i wire:click="delete({{ $key->id }})"  class="fa fa-trash m-lg-2"></i>
                   </div>
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
