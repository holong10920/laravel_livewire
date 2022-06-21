<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Contact;

class ContactComponent extends Component
{
    public $data, $name, $phone, $address, $selected_id;
    public $searchTerm = '';
    public $updateMode = false;
    public $post;

    public function changePost() {
        $this->post = $this->post;
    }

    public function render() {
        $this->data = Contact::where('name', 'like', '%'.$this->searchTerm.'%')->get();

        return view('livewire.contacts.component');
    }

    private function resetInput() {
        $this->reset([
            'name',
            'phone',
            'address'
        ]);
    }

    public function store() {
        $this->validate([
            'name' => 'required|min:5',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Contact::create([
            'name' => $this->name,
            'phone_number' => $this->phone,
            'address' => $this->address,
        ]);

        $this->resetInput();
    }

    public function edit($id) {
        $record = Contact::findOrFail($id);

        $this->selected_id = $id;
        $this->name = $record->name;
        $this->phone = $record->phone_number;
        $this->address = $record->address;

        $this->updateMode = true;
    }

    public function update() {
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => 'required|min:5',
            'phone' => 'required',
            'address' => 'required',

        ]);

        if ($this->selected_id) {
            $record = Contact::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'phone_number' => $this->phone,
                'address' => $this->address,
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id) {
        if ($id) {
            $record = Contact::where('id', $id);
            $record->delete();
        }
    }

    public function cancel() {
        $this->resetInput();
        $this->updateMode = false;
    }

}
