<?php

namespace App\Http\Livewire\Components;

use App\Models\Board;
use Livewire\Component;

class ModifyBoard extends Component
{
    protected $listeners = ['emitBoard'];
    public $boardId;
    public $board;
    public $title;
    public $workspaceId;

    public function emitBoard($id)
    {
        $this->boardId = $id;
        $this->board = Board::find($id);
        $this->title = $this->board->name;
        $this->workspaceId = $this->board->workspace_id;
    }

    public function boardRule()
    {
        return [
            'title' => 'required|min:3|max:50',
        ];
    }

    public function message()
    {
        return [
            'title.required' => 'Title is required!',
            'title.min' => 'Title must be at least 3 characters!',
            'title.max' => 'Title cannot be longer than 50 characters!',
        ];
    }

    public function modifyBoard()
    {
        $this->validate($this->boardRule(), $this->message());

        $this->board->update([
            'name'  => $this->title,
        ]);

        $this->emit('emitSuccess', 'success');
        $this->dispatchBrowserEvent('closemodel');
    }

    public function deleteBoard()
    {
        $this->board->delete();

        return redirect()->route('workspace', ['w' => $this->workspaceId, 'b' => null]);
    }

    public function render()
    {
        return view('livewire.components.modify-board');
    }
}
