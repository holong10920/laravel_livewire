<div>
    <h2>New Contact</h2>
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
    <button wire:click.lazy="store()" class="btn btn-primary" id="btn_save_todo">Save</button>
</div>
