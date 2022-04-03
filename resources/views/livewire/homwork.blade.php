<div>
    <div class="mt-5 mb-5" >
        <form wire:submit.prevent="add_homework">
            <input type="file" wire:model="homework">
            <button class="btn btn-success">Ուղարկել</button>
        </form>
    </div>
</div>
