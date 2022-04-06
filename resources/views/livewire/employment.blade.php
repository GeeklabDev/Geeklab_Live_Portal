<div class="container">
        <select name="" class="form-control mb-5" id="" wire:change="filter" wire:model="weekday">
            <option value="1">Երկուշաբթի</option>
            <option value="2">Երեքշաբթի</option>
            <option value="3">Չորեքշաբթի</option>
            <option value="4">Հինգշաբթի</option>
            <option value="5">Ուրբաթ</option>
            <option value="6">Շաբաթ</option>
            <option value="7">Կիրակի</option>
        </select>
    <table class="table table-dark">
        <tr>
            <th>WeekDays</th>
            <th>Hours</th>
            <th>Employ</th>
        </tr>
        @foreach($employments as $key)
            <tr>
                <?php
                $weekday = '';
                switch ($key->weekdays){
                    case 1:
                        $weekday='Երկուշաբթի';
                        break;
                    case 2:
                        $weekday='Երեքշաբթի';
                        break;
                    case 3:
                        $weekday='Չորեքշաբթի';
                        break;
                    case 4:
                        $weekday='Հինգշաբթի';
                        break;
                    case 5:
                        $weekday='Ուրբաթ';
                        break;
                    case 6:
                        $weekday='Շաբաթ';
                        break;
                    case 7:
                        $weekday='Կիրակի';
                        break;
                }
                ?>
                <td>{{ $weekday }}</td>
                <td>{{ $key->hours }}</td>
                <td>
                    @if($key->employ==1)
                        <button wire:click="off({{ $key->id }})" class="btn btn-danger">Ազատել այս ժամը</button>
                    @else
                        <button wire:click="on({{ $key->id }})" class="btn btn-success">Լրացնել այս ժամը</button>

                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</div>
