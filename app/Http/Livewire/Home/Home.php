<?php

namespace App\Http\Livewire\Home;

use App\Models\Workspace;
use App\Models\WorkspacePermission;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
    public $userId;

    public function mount()
    {
        $this->userId = Auth::user()->id;
    }

    public function setBoard($id)
    {
        $this->emit('emitWorkspace', $id);
    }

    public function render()
    {
        $userWorkspaces = WorkspacePermission::where('user_id', $this->userId)->get();
        $workspaceIds = $userWorkspaces->pluck('id')->toArray();
        $workspaces = Workspace::whereIn('id', $workspaceIds)->get();

        return view('livewire.home.home', [
            'workspaces' => $workspaces,
        ])->extends('layouts.app')->section('content');
    }
}
