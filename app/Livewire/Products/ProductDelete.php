<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class ProductDelete extends Component
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
        $user = Product::findOrFail($this->itemId);
        $user->forceDelete();
        $this->reset();
        $this->closeDeleteModel();
        $this->dispatch('refreshParent');

    }
    
    public function render()
    {
        return view('livewire.products.product-delete');
    }
}
