<?php

namespace App\Http\Livewire\Components;

use App\Models\Workspace;
use App\Models\WorkspacePermission;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateWorkspace extends Component
{
    public $name;
    public $description;
    public $userId;
    public $step;

    public function mount()
    {
        $this->userId = Auth::user()->id;
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function workSpaceRule()
    {
        return [
            'name' => 'required|min:3|max:50',
            'description' => 'nullable|max:255',
        ];
    }

    public function message()
    {
        return [
            'name.required' => 'Workspace name is required!',
            'name.min' => 'Workspace name must be at least 3 characters!',
            'name.max' => 'Workspace name cannot be longer than 50 characters!',
            'description.max' => 'Description cannot be longer than 255 characters!',
        ];
    }

    public function createWorkspace()
    {
        $this->validate($this->workSpaceRule(), $this->message());

        $workspace = Workspace::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        WorkspacePermission::create([
            'workspace_id' => $workspace->id,
            'user_id' => $this->userId,
        ]);

        return redirect()->route('workspace', ['w' => $workspace->id, 'b' => null]);
    }

    public function render()
    {
        return view('livewire.components.create-workspace');
    }
}
