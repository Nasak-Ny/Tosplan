<?php

namespace App\Http\Livewire\Components;

use App\Models\ListModel;
use Livewire\Component;

class ModifyList extends Component
{
    protected $listeners = ['emitList'];
    public $listId;
    public $list;
    public $title;

    public function emitList($id)
    {
        $this->listId = $id;
        $this->list = ListModel::find($id);
        $this->title = $this->list->name;
    }

    public function listRule()
    {
        return [
            'title' => 'required|min:3|max:30',
        ];
    }

    public function message()
    {
        return [
            'title.required' => 'Title is required!',
            'title.min' => 'Title must be at least 3 characters!',
            'title.max' => 'Title cannot be longer than 30 characters!',
        ];
    }

    public function modifyList()
    {
        $this->validate($this->listRule(), $this->message());

        $this->list->update([
            'name'  => $this->title,
        ]);

        $this->emit('emitSuccess', 'success');
        $this->dispatchBrowserEvent('closemodel');
    }

    public function deleteList()
    {
        $this->list->delete();

        $this->emit('emitSuccess', 'success');
        $this->dispatchBrowserEvent('closemodel');
    }

    public function render()
    {
        return view('livewire.components.modify-list');
    }
}
