<div>
    <div class="mt-5 mb-5" >
        <form wire:submit.prevent="add_homework">
            <input type="file" wire:model="homework">
            <button class="btn btn-success">Ուղարկել</button>
        </form>
    </div>
    <div class="homeworks-box mb-5">
        @foreach($homeworks as $key)
            <div class="mt-4">
                <h4>
                    <a download href="{{ asset("storage/".$key->homework) }}"> Ներբեռնել </a>
                    <span>(Գնահատականը՝ {{ $key->rating }})</span>
                </h4>
            </div>
        @endforeach
    </div>
</div>
