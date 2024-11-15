<?php

namespace App\Livewire\Feedback;

use App\Models\Feedback;
use Livewire\Component;
use Livewire\WithPagination;

class FeedbackIndex extends Component
{
    use WithPagination;

    public ?string $term = null;

    protected $listeners = [ 'refreshParent' => '$refresh'];

    public int $perPage = 10;

    public string $orderBy = 'id';
    public string $sortBy = 'desc';

    public $readyToLoad = false;

    public function loadItems()
    {
        $this->readyToLoad = true;
    }

    public function mount() {
        $this->selectedInscrits = collect();
    }


    public function selectedItem($action ,$itemId = null){
        if ($action == 'create'){
            $this->dispatch('showCreateModel');
        }elseif ($action == 'update'){
            $this->dispatch('showUpdateModel', $itemId);
        }elseif ($action == 'show'){
            $this->dispatch('showItemModel', $itemId);
        }elseif ($action == 'delete'){
            $this->dispatch('showDeleteModel', $itemId);
        }elseif ($action == 'restore'){
            $this->dispatch('showRestoreModel', $itemId);
        }
    }

    public function getItem(){
        $feedback = Feedback::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $feedback = $feedback->search(trim($this->term));
        }
        
    
        $feedback = $feedback->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);
    
        return $feedback;
    
    }

    public function render()
    {
        return view('livewire.feedback.feedback-index',[
            'feedbacks'  =>  $this->readyToLoad ? $this->getItem() : [],
        ]);
    }
}
