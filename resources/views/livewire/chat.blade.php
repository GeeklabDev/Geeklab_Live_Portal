<div class="container" wire:pull>
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
                        <ul class="m-b-0" id="messages-for-audio">
                            @foreach($messages as $key)
                                @if($key->from_id == Auth::id())
                                    <li class="clearfix">
                                        <div class="message other-message float-right">
                                            {{ $key->message }}
                                            @if($key->audio!=null)
                                            <audio controls>
                                                <source src="${jsonResponse}">
                                            </audio>
                                            @endif
                                        </div>
                                    </li>
                                @else
                                    <li class="clearfix">
                                        <div class="message my-message">
                                            {{ $key->message }}
                                            @if($key->audio!=null)
                                                <audio controls>
                                                    <source src="${jsonResponse}">
                                                </audio>
                                            @endif
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="chat-message clearfix d-flex align-items-center">
                        <form wire:submit.prevent="send" class="d-flex align-items-center">
                            <div class="form-group mt-3">
                                <input class="form-control" required type="text" wire:model.defer="message">
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                </button>
                            </div>
                        </form>
                        <div id="controls" class="d-flex align-items-center">
                            <button id="recordButton" class="btn btn-info mt-3 mx-2" type="button">
                                <i class="fa fa-microphone"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
<script >
    //webkitURL is deprecated but nevertheless
    URL = window.URL || window.webkitURL;

    var gumStream;                      //stream from getUserMedia()
    var rec;                            //Recorder.js object
    var input;                          //MediaStreamAudioSourceNode we'll be recording

    // shim for AudioContext when it's not avb.
    var AudioContext = window.AudioContext || window.webkitAudioContext;
    var audioContext //audio context to help us record

    var recordButton = document.getElementById("recordButton");
    var stopButton = document.getElementById("stopButton");
    var pauseButton = document.getElementById("pauseButton");

    //add events to those 2 buttons
    recordButton.addEventListener("mousedown", startRecording);
    recordButton.addEventListener("mouseup", stopRecording);

    function startRecording() {
        console.log("recordButton clicked");
        var constraints = { audio: true, video:false }
        navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
            console.log("getUserMedia() success, stream created, initializing Recorder.js ...");
            audioContext = new AudioContext();
            gumStream = stream;
            input = audioContext.createMediaStreamSource(stream);
            rec = new Recorder(input,{numChannels:1})
            rec.record()
        }).catch(function(err) {
            //enable the record button if getUserMedia() fails
        });
    }

    function pauseRecording(){
        console.log("pauseButton clicked rec.recording=",rec.recording );
        if (rec.recording){
            //pause
            rec.stop();
            pauseButton.innerHTML="Resume";
        }else{
            //resume
            rec.record()
            pauseButton.innerHTML="Pause";

        }
    }

    function stopRecording() {
        rec.stop();
        gumStream.getAudioTracks()[0].stop();
        rec.exportWAV(createDownloadLink);
    }

    function createDownloadLink(blob) {
        var filename = new Date().toISOString();

        var xhr=new XMLHttpRequest();
        var fd=new FormData();
        fd.append("audio_data",blob, filename);
        fd.append("_token", '{{ csrf_token() }}');
        fd.append("group_id", '{{ $group_id }}');
        xhr.open("POST","recorder",true);
        xhr.onload=function() {
            let jsonResponse = xhr.response;
            $('#messages-for-audio').append(`
                <li class="clearfix">
                    <div class="message other-message float-right">
                         <audio controls>
                            <source src="${jsonResponse}">
                         </audio>
                    </div>
                </li>

            `)
        };
        xhr.send(fd);


    }
</script>
