<?php

namespace App\Http\Livewire\Account;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Account extends Component
{
    public $user;
    public $currentName;
    public $name;
    public $currentEmail;
    public $email;
    public $password;
    public $newPassword;
    public $confirmPassword;

    public function mount()
    {
        $this->user = User::find(auth()->user()->id);
        $this->currentName  = $this->user->name;
        $this->name = $this->user->name;
        $this->currentEmail = $this->user->email;
        $this->email = $this->user->email;
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function usernameRule()
    {
        return [
            'name' => 'required|min:3|max:20|unique:users,name',
        ];
    }

    public function emailRule()
    {
        return [
            'email' => 'required|email|max:30|unique:users,email',
        ];
    }

    public function passwordRule()
    {
        return [
            'password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, $this->user->password)) {
                        $fail('Current password is incorrect.');
                    }
                },
            ],
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|same:newPassword',
        ];
    }

    public function message()
    {
        return [
            'name.required' => 'Username is required!',
            'name.min' => 'Username must be at least 3 characters!',
            'name.max' => 'Username cannot be longer than 20 characters!',
            'name.unique' => 'Username is already taken!',
            'email.required' => 'Email is required!',
            'email.email' => 'Email must be valid format!',
            'email.max' => 'Email cannot be longer than 30 characters',
            'email.unique' => 'This Email is already used!',
            'password.required' => 'Current password is required!',
            'newPassword.required' => 'New password is required!',
            'newPassword.min' => 'Password must be at least 6 characters!',
            'confirmPassword.required' => 'Confirm password is required!',
            'confirmPassword.same' => 'Confirm password is not matched!',
        ];
    }

    public function saveName()
    {
        $this->validate($this->usernameRule(), $this->message());

        $this->user->update([
            'name' => $this->name,
        ]);

        session()->flash('successMessage', 'Username has been updated');
        $this->currentName = $this->name;
    }

    public function saveEmail()
    {
        $this->validate($this->emailRule(), $this->message());

        $this->user->update([
            'email' => $this->email,
        ]);

        session()->flash('successMessage', 'Email has been updated');
        $this->currentEmail = $this->email;
    }

    public function changePassword()
    {
        $this->validate($this->passwordRule(), $this->message());

        $this->user->update([
            'password' => Hash::make($this->newPassword),
        ]);

        session()->flash('successMessage', 'Password has been updated');
        $this->password = null;
        $this->newPassword = null;
        $this->confirmPassword = null;
    }

    public function render()
    {
        return view('livewire.account.account')->extends('layouts.app')->section('content');
    }
}
