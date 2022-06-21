<div>
    <div class="row">Laravel - Livewire CRUD</div>

    <div class="row">
        <div class="col-md-6">
            @if($updateMode)
                @include('livewire.contacts.update')
            @else
                @include('livewire.contacts.create')
            @endif
        </div>
        <div class="col-md-6">
            <input wire:model.searchTerm="searchTerm" type="text" placeholder="Search todos..."/>
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
                            wire:click.lazy="destroy({{ $row->id }})"
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
    document.addEventListener("DOMContentLoaded", function () {
        window.livewire.hook('message.processed', (message, component) => {
            $('#btn_save_todo').click(function () {
                if (component.fingerprint.name=='contact-component' && Object.entries(message.response.serverMemo.errors).length > 0) {
                    var obj = message.response.serverMemo.errors;
                    for (var key in obj) {
                        Swal.fire({
                            title: 'Error',
                            html:`
                                <div>${obj['name'] ? obj['name'] : ''}</div>
                                <div>${obj['phone'] ? obj['phone'] : ''}</div>
                                <div>${obj['address'] ? obj['address'] : ''}</div>
                            `,
                            icon: 'warning',
                        })
                    }
                }
            })
        })
    });
</script>
