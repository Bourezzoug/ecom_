<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    public ?string $term = null;

    public $selectedProducts = [];
    
    public $selecteAll = false;

    protected $listeners = [ 'refreshParent' => '$refresh'];

    public int $perPage = 10;

    public string $orderBy = 'id';
    public string $sortBy = 'desc';
    public string $type = '';

    public ?string $categories = null;


    public $readyToLoad = false;

    public function loadItems()
    {
        $this->readyToLoad = true;
    }

    public function mount() {
        $this->selectedProducts = collect();
    }

    public function deleteSelected() {
        Product::query()->whereIn('id',$this->selectedProducts)->forceDelete();
        $this->selectedProducts = [];
        $this->selecteAll = false;
    }

    

    public function updatedSelecteAll($value) {
        if($value) {
            $this->selectedProducts = $this->getItem()->pluck('id');
        }
        else{
            $this->selectedProducts = [];
        }
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
        $products = Product::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $products = $products->search(trim($this->term));
        }

        $products = $products->with(['category:id,name']); //This is for relationships

        if (!empty($this->categories)){
            $products = $products->where('category_id',$this->categories);
        }


        $products = $products->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $products;

    }

    public function render()
    {
        $categorie = Category::pluck('name', 'id');
        return view('livewire.products.product-index',[
            'products' => $this->readyToLoad ? $this->getItem() : [],
            'categorie'    =>  $categorie,
        ]);
    }
}
