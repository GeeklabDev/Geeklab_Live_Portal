<div class="container" wire:poll>
    <h1>{{ now() }}</h1>
    <div class="row clearfix mt-5">
        <div class="col-lg-12 mt-5">
            <div class="card chat-app">
                <div id="plist" class="people-list">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                    <ul class="list-unstyled chat-list mt-2 mb-0">
                        @foreach($groups as $key)
                            <li class="clearfix" wire:click="selectedChat({{ $key->id }})">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                                <div class="about">
                                    <div class="name">{{ $key->name }}</div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="chat">
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                </a>
                                <div class="chat-about">
                                    <h6 class="m-b-0">Aiden Chavez</h6>
                                    <small>Last seen: 2 hours ago</small>
                                </div>
                            </div>
                            <div class="col-lg-6 hidden-sm text-right">
                                <a href="javascript:void(0);" class="btn btn-outline-secondary"><i
                                        class="fa fa-camera"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-primary"><i
                                        class="fa fa-image"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-info"><i
                                        class="fa fa-cogs"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-warning"><i
                                        class="fa fa-question"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="chat-history">
                        <ul class="m-b-0" wire:poll>
                            @foreach($messages as $key)
                                @if($key->from_id == Auth::id())
                                    <li class="clearfix">
                                        <div class="message other-message float-right">
                                            {{ $key->message }}
                                        </div>
                                    </li>
                                @else
                                    <li class="clearfix">
                                        <div class="message my-message">
                                            {{ $key->message }}
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="chat-message clearfix">
                        <form wire:submit.prevent="send">
                            <div class="form-group mt-3">
                                <label for="">Message</label>
                                <input class="form-control" required type="text" wire:model.defer="message">
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
