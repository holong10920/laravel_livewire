<div>
    <h2>Edit Contact</h2>
    <input type="hidden" wire:model="selected_id">
    <div class="form-group">
        <label for="email">Name:</label>
        <input wire:model.lazy="name" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="pwd">Phone:</label>
        <input wire:model.lazy="phone" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="pwd">Address:</label>
        <input wire:model.lazy="address" type="text" class="form-control">
    </div>
    <button wire:click="update()" class="btn btn-primary">Update</button>
    <button wire:click="cancel()" class="btn btn-default">Cancel</button>
</div>
