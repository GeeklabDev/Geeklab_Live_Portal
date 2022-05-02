<div>
        <form wire:submit.prevent="save">
            @csrf
            <div class="form-group mt-3">
                <label for="">Խմբի անունը</label>
                <input class="form-control" required type="text" wire:model="name" >
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-info">Ավելացնել</button>
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
        <div class="cards-dashboard mt-lg-4">
            @foreach($groupsUsers as $key)
                <div class="card-dashboard">
                    <span wire:click="delete({{ $key->id }})" class="fa fa-trash" aria-hidden="true"></span>
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <h3>{{ $key['name'] }}
                    </h3>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal"  data-bs-target="#myModal-{{ $key->id }}" >Խմբի ուսանողները</button>
                    <div class="modal" id="myModal-{{ $key->id }}" >
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Ավելացնել ուսանող</h4>
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
                                        </tr>
                                        @foreach($key['users'] as $keys)
                                            <tr>
                                                <td>{{ $keys['user']['id'] }}</td>
                                                <td>{{ $keys['user']['name'] }}</td>
                                                <td>{{ $keys['user']['surname'] }}</td>
                                                <td>{{ $keys['user']['phone'] }}</td>
                                                <td>{{ $keys['user']['email'] }}</td>
                                            </tr>
                                        @endforeach
                                        <tfooter class="mb-5">
                                            <form method="POST" action="add/student/{{ $key->id }}">
                                                @csrf
                                                <div class="d-flex w-100 justify-content-between align-items-center">
                                                    <div class="w-75 h-100">
                                                        <input type="text" placeholder="User email" class="form-control"  name="email" id="title">
                                                    </div>
                                                    <div class="w-25 h-100 form-group">
                                                        <button class="w-100 btn btn-success">Ավելացնել</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </tfooter>
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
                </div>
            @endforeach
        </div>
</div>
