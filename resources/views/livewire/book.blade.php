<div>
    <form wire:submit.prevent="save">
        <div class="form-group mt-3">
            <label for="">File</label>
            <input type="file" class="form-control" wire:model="file">
        </div>
        <div class="form-group mt-3">
            <button class="btn btn-success">Add</button>
        </div>
    </form>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>FILE</th>
            <th>DELETE</th>
        </tr>
        @foreach($books as $key)
            <tr>
                <td>{{ $key->id }}</td>
                <td>
                    <a href="{{ asset($key->file) }}">Book</a>
                </td>
                <td>
                    <button wire:click="delete({{$key->id}})" class="btn btn-danger">Delete</button>
                </td>
            </tr>
        @endforeach
    </table>
</div>
