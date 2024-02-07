<?php

namespace App\Http\Livewire\Login;

use App\Models\Board;
use App\Models\Card;
use App\Models\ListModel;
use App\Models\User;
use App\Models\Workspace;
use App\Models\WorkspacePermission;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public $name;
    public $password;
    public $regName;
    public $regEmail;
    public $regPassord;
    public $confirmRegPassword;
    public $isAgree;


    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function login()
    {
        $this->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['name' => $this->name, 'password' => $this->password]))
        {
            // Authentication passed...

            return redirect('/myboards');

        }
        else
        {
            $this->addError('Incorrect', 'Incorrect Username or Password.');
        }
    }

    public function clearLogin()
    {
        $this->name = null;
        $this->password = null;
    }

    public function clearRegister()
    {
        $this->regName = null;
        $this->regEmail = null;
        $this->regPassord = null;
        $this->confirmRegPassword = null;
    }

    public function registerRule()
    {
        return [
            'regName' => 'required|min:3|max:20|unique:users,name',
            'regEmail' => 'required|email|max:30|unique:users,email',
            'regPassord' => 'required|min:6',
            'confirmRegPassword' => 'required|same:regPassord',
        ];
    }

    public function registerMessages()
    {
        return [
            'regName.required' => 'Username is required!',
            'regName.min' => 'Username must be at least 3 characters!',
            'regName.max' => 'Username cannot be longer than 20 characters!',
            'regName.unique' => 'Username is already taken!',
            'regEmail.required' => 'Email is required!',
            'regEmail.email' => 'Email must be valid format!',
            'regEmail.max' => 'Email cannot be longer than 30 characters',
            'regEmail.unique' => 'This Email is already used!',
            'regPassord.required' => 'Password is required!',
            'regPassord.min' => 'Password must be at least 6 characters!',
            'confirmRegPassword.required' => 'Confirm password is required!',
            'confirmRegPassword.same' => 'Password is not matched!',
        ];
    }

    public function register()
    {
        $this->validate($this->registerRule(), $this->registerMessages());

        $newUser = User::create([
            'name' => $this->regName,
            'email' => $this->regEmail,
            'password' => Hash::make($this->regPassord),
        ]);

        $newWorkspace = Workspace::create([
            'name' => "Tosplan Workspace",
            'description' => "Welcome to Tosplan default workspace",
        ]);

        WorkspacePermission::create([
            'user_id' => $newUser->id,
            'workspace_id' => $newWorkspace->id,
        ]);

        $newBoard = Board::create([
            'workspace_id' => $newWorkspace->id,
            'name' => "My first board",
            // 'last_visited' => date('Y-m-d H:i:s'),
        ]);

        $toDo = ListModel::create([
            'board_id' => $newBoard->id,
            'name' => "To Do",
            'order' => 1,
        ]);

        ListModel::create([
            'board_id' => $newBoard->id,
            'name' => "Doing",
            'order' => 2,
        ]);

        ListModel::create([
            'board_id' => $newBoard->id,
            'name' => "Done",
            'order' => 3,
        ]);

        Card::create([
            'list_id' => $toDo->id,
            'name' => "Drag this card",
            'order' => 1,
        ]);

        $this->clearRegister();
        session()->flash('successMessage', 'Your account has been created');
        $this->dispatchBrowserEvent('success');
    }

    public function logout()
    {
        Auth::logout();
        // Session::flush();
        // return redirect('/login');
    }

    public function render()
    {
        return view('livewire.login.login')->extends('layouts.app')->section('content');
    }
}
