<?php

namespace App\Http\Livewire\Workspace;

use App\Models\Board;
use App\Models\Card;
use App\Models\ListModel;
use App\Models\Workspace;
use App\Models\WorkspacePermission;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Workspaces extends Component
{
    protected $listeners = ['updateCardList', 'emitSuccess'];
    public $workspaceId;
    public $userId;
    public $boardId;
    public $cardTitle;
    public $listTitle;
    public $message;

    public function emitSuccess($message)
    {
        $this->message = $message;
    }

    public function mount()
    {
        $this->workspaceId = request()->input('w');
        $this->boardId = request()->input('b');
        $this->userId = Auth::user()->id;
    }

    public function updateListOrder($lists)
    {
        foreach ($lists as $list)
        {
            $listId = $list['value'];
            $listOrder = $list['order'];

            $list = ListModel::find($listId);

            $list->update([
                'order' => $listOrder,
            ]);
        }
    }

    public function updateCardOrder($lists)
    {
        foreach ($lists as $list)
        {
            $listId = $list['value'];

            if (isset($list['items']))
            {
                foreach ($list['items'] as $card)
                {
                    $cardId = $card['value'];
                    $cardOrder = $card['order'];

                    $card = Card::find($cardId);

                    $card->update([
                        'list_id' => $listId,
                        'order' => $cardOrder,
                    ]);

                }
            }
        }
    }

    public function clearTitle()
    {
        $this->cardTitle = null;
    }

    public function clearListTitle()
    {
        $this->listTitle = null;
    }

    public function saveCard($id)
    {
        if($this->cardTitle)
        {
            $lastCard = Card::where('list_id', $id)->orderBy('order', 'desc')->first();

            if($lastCard)
            {
                $order = $lastCard->order + 1;
            }
            else
            {
                $order = 1;
            }

            Card::create([
                'list_id' => $id,
                'name' => $this->cardTitle,
                'order' => $order,
            ]);

            $this->cardTitle = null;
        }
    }

    public function saveList()
    {
        if($this->listTitle)
        {
            $lastList = ListModel::where('board_id', $this->boardId)->orderBy('order', 'desc')->first();

            if($lastList)
            {
                $order = $lastList->order + 1;
            }
            else
            {
                $order = 1;
            }

            ListModel::create([
                'board_id' => $this->boardId,
                'name' => $this->listTitle,
                'order' => $order,
            ]);

            $this->listTitle = null;
        }
    }

    public function setBoard($id)
    {
        $this->emit('emitWorkspace', $id);
    }

    public function setBoard2($id)
    {
        $this->emit('emitBoard', $id);
    }

    public function setWorkspace($id)
    {
        $this->emit('emitWorkspace', $id);
    }

    public function setList($id)
    {
        $this->emit('emitList', $id);
    }

    public function setCard($id)
    {
        $this->emit('emitCard', $id);
    }

    public function render()
    {
        $userWorkspaces = WorkspacePermission::where('user_id', $this->userId)->get();
        $workspaceIds = $userWorkspaces->pluck('id')->toArray();

        $status = in_array($this->workspaceId, $workspaceIds) ? 1 : 0;

        $workspace = Workspace::find($this->workspaceId);

        if($workspace)
        {
            $boards = Board::where('workspace_id', $workspace->id)->orderBy('id', 'desc')->get();

            if($this->boardId)
            {
                $board = Board::find($this->boardId);
            }
        }

        return view('livewire.workspace.workspaces',[
            'workspace' => $workspace ?? null,
            'boards' => $boards ?? null,
            'board' => $board ?? null,
            'status' => $status,
        ])->extends('layouts.app')->section('content');
    }
}
