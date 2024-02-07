<?php

namespace App\Http\Livewire\Inc\Navbar;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public function logout()
    {
        Auth::logout();
        // Session::flush();
        return redirect('/login');
    }

    public function render()
    {
        return view('livewire.inc.navbar.navbar')->extends('layouts.app')->section('content');
    }
}
