<?php

namespace App\Http\Livewire\Components;

use App\Models\User;
use App\Models\Workspace;
use App\Models\WorkspacePermission;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ModifyWorkspace extends Component
{
    protected $listeners = ['emitWorkspace'];
    public $workspaceId;
    public $username;
    public $member;
    public $userId;
    public $workspace;
    public $name;
    public $description;

    public function mount()
    {
        $this->userId = Auth::user()->id;
    }

    public function emitWorkspace($id)
    {
        $this->workspaceId = $id;
        $this->workspace = Workspace::find($id);
        $this->name = $this->workspace->name;
        $this->description = $this->workspace->description;
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

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function addMember()
    {
        WorkspacePermission::create([
            'workspace_id' => $this->workspaceId,
            'user_id' => $this->member,
        ]);

        $this->username = null;
    }

    public function modifyWorkspace()
    {
        $this->validate($this->workSpaceRule(), $this->message());

        $this->workspace->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->emit('emitSuccess', 'success');
        $this->dispatchBrowserEvent('closemodel');
    }

    public function deleteWorkspace()
    {
        $this->workspace->delete();

        return redirect('/myboards');
    }

    public function render()
    {
        if($this->username)
        {
            $member = User::where('name', $this->username)->first();

            if($member)
            {
                if($member->id == $this->userId)
                {
                    $this->member == null;
                }
                else
                {
                    $this->member = $member->id;
                }
            }
            else
            {
                $this->member = null;
            }
        }

        $workspacePermissions = WorkspacePermission::where('workspace_id', $this->workspaceId)->get();

        return view('livewire.components.modify-workspace', [
            'workspacePermissions' => $workspacePermissions,
        ]);
    }
}
