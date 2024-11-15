<?php

namespace App\Livewire\Pack;

use Livewire\Component;
use App\Models\Pack;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PackDelete extends Component
{
    use AuthorizesRequests;

    public $showDeleteModel = false;
    public $showForceDeleteModel = false;
    public $itemId;

    protected $listeners = ['showDeleteModel'];

    public function showDeleteModel($itemId){
        $this->itemId = $itemId;
        $this->showDeleteModel = true;
    }

    public function closeDeleteModel(){
        $this->showDeleteModel = false;
        $this->reset();
    }

    public function delete(){
        $user = Pack::findOrFail($this->itemId);
        $user->forceDelete();
        $this->reset();
        $this->closeDeleteModel();
        $this->dispatch('refreshParent');

    }

    public function render()
    {
        return view('livewire.pack.pack-delete');
    }
}
