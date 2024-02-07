<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Testing extends Component
{
    public function render()
    {
        return view('livewire.testing')->extends('layouts.app')->section('content');
    }
}
