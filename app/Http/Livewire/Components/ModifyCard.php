<?php

namespace App\Http\Livewire\Components;

use App\Models\Card;
use Livewire\Component;

class ModifyCard extends Component
{
    protected $listeners = ['emitCard'];
    public $cardId;
    public $card;
    public $title;
    public $description;
    public $date;

    public function emitCard($id)
    {
        $this->cardId = $id;
        $this->card = Card::find($id);
        $this->title = $this->card->name;
        $this->description = $this->card->description;

        if($this->card->date)
        {
            $this->date = date('Y-m-d', strtotime($this->card->date));
        }
        else
        {
            $this->date = null;
        }
    }

    public function changeTitle()
    {
        $this->card->update(['name'=> $this->title]);
        $this->emit('emitSuccess', 'success');
    }

    public function changeDescription()
    {
        $this->card->update(['description'=> $this->description]);
        $this->emit('emitSuccess', 'success');
    }

    public function changeDate()
    {
        $this->card->update(['date'=> $this->date]);
        $this->emit('emitSuccess', 'success');
    }

    public function daleteCard()
    {
        $this->card->delete();
        $this->emit('emitSuccess', 'success');
    }

    public function render()
    {
        return view('livewire.components.modify-card');
    }
}
