<?php

namespace App\Http\Livewire\Inc\Sidebar;

use App\Models\Workspace;
use App\Models\WorkspacePermission;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Sidebar extends Component
{
    protected $listeners = ['emitSuccess'];
    public $activePage;
    public $activeWorkspace;
    public $userId;
    public $message;

    public function emitSuccess($message)
    {
        $this->message = $message;
    }
    public function mount()
    {
        $this->userId = Auth::user()->id;
        $this->activePage = explode('/', request()->path())[0];
        $this->activeWorkspace = request()->input('w');
    }

    public function render()
    {
        $userWorkspaces = WorkspacePermission::where('user_id', $this->userId)->get();
        $workspaceIds = $userWorkspaces->pluck('id')->toArray();

        $workspaces = Workspace::whereIn('id', $workspaceIds)->get();

        return view('livewire.inc.sidebar.sidebar', [
            'activePage' => $this->activePage,
            'activeWorkspace' => $this->activeWorkspace,
            'workspaces' => $workspaces,
        ]);
    }
}
