<div>
    <h2>New Contact</h2>
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
    <button wire:click="store()" class="btn btn-primary">Save</button>
</div>
