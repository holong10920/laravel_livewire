<div>
    <h2>Edit Contact</h2>
    <input type="hidden" wire:model="selected_id">
    <div class="form-group">
        <label for="name">Name:</label>
        <input wire:model.lazy="name" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="phone">Phone:</label>
        <input wire:model.lazy="phone" type="number" class="form-control">
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input wire:model.lazy="address" type="text" class="form-control">
    </div>
    <button wire:click.lazy="update()" class="btn btn-primary">Update</button>
    <button wire:click.lazy="cancel()" class="btn btn-warning">Cancel</button>
</div>
