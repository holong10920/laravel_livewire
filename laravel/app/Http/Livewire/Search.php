<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;

class Search extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.search', [
            'users' => User::where('name', 'like','%'.$this->search.'%')->get(),
        ]);
    }
}
