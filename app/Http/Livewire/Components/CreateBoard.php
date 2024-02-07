<?php

namespace App\Http\Livewire\Components;

use App\Models\Board;
use App\Models\Workspace;
use App\Models\WorkspacePermission;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateBoard extends Component
{
    protected $listeners = ['emitWorkspace'];
    public $userId;
    public $title;
    public $workspaceId;

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function mount()
    {
        $this->userId = Auth::user()->id;
    }

    public function emitWorkspace($id)
    {
        $this->workspaceId = $id;
    }

    public function boardRule()
    {
        return [
            'title' => 'required|min:3|max:50',
            'workspaceId' => 'required|numeric',
        ];
    }

    public function message()
    {
        return [
            'title.required' => 'Title is required!',
            'title.min' => 'Title must be at least 3 characters!',
            'title.max' => 'Title cannot be longer than 50 characters!',
            'workspaceId.required' => 'Workspace is required!',
        ];
    }

    public function  createBoard()
    {
        $this->validate($this->boardRule(), $this->message());

        $board = Board::create([
            'workspace_id' =>  $this->workspaceId,
            'name'  => $this->title,
        ]);

        return redirect()->route('workspace', ['w' => $this->workspaceId, 'b' => $board->id]);
    }

    public function render()
    {
        $userWorkspaces = WorkspacePermission::where('user_id', $this->userId)->get();
        $workspaceIds = $userWorkspaces->pluck('id')->toArray();
        $workspaces = Workspace::whereIn('id', $workspaceIds)->get();

        return view('livewire.components.create-board', [
            'workspaces' => $workspaces,
        ]);
    }
}
