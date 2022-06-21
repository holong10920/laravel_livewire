<div>
    <div class="row">Laravel - Livewire CRUD</div>

    <div class="row">
        <div class="col-md-6">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">×</a>
                <strong>Sorry!</strong> invalid input.<br><br>
                <ul style="list-style-type:none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if($updateMode)
                @include('livewire.contacts.update')
            @else
                @include('livewire.contacts.create')
            @endif
        </div>
        <div class="col-md-6">
            <input wire:model.searchTerm="searchTerm" type="text" placeholder="Search todos..."/>

            <div class="container">
                <input wire:model.lazy="post" type="text" placeholder="Change..."/>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 20px">
        <table class="table table-bordered table-condensed">
            <tr>
                <td>ID</td>
                <td>NAME</td>
                <td>PHONE</td>
                <td>ADDRESS</td>
                <td>ACTION</td>
            </tr>
            @foreach($data as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->phone_number}}</td>
                    <td>{{$row->address}}</td>
                    <td width="150">
                        <button wire:click="edit({{ $row->id }})" class="btn btn-xs btn-primary">Edit</button>
                        <button
                            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                            wire:click="destroy({{ $row->id }})"
                            class="btn btn-xs btn-danger"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', () => {
        Livewire.onPageExpired((response, message) => {})
        console.log(123)
    })
</script>
