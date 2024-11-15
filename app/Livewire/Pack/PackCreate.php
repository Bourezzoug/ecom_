<?php

namespace App\Livewire\Pack;


use App\Models\Category;
use App\Models\Product;
use App\Models\Pack;
use App\Models\Variation;
use Illuminate\Validation\Rule;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;
use Illuminate\Support\Str;

class PackCreate extends Component
{

    use InteractsWithBanner;


    public $categories;

    public $name, $price;

    public $selectedProduct;
    public $quantity;

    protected $listeners = ['showCreateModel'];
    public $productQuantities = [];


    public bool $showCreateModel = false;

    public function showCreateModel(){
        $this->showCreateModel = true;
    }

    public function addProductQuantity()
    {

        $this->productQuantities[] = [
            'product_id' => $this->selectedProduct,
            'quantity' => $this->quantity,
        ];

        $this->selectedProduct = '';
        $this->quantity = 0;
    }

    public function removeProductQuantity($index)
    {
        unset($this->productQuantities[$index]);
        $this->productQuantities = array_values($this->productQuantities);
    }


    public function closeCreateModel(){
        $this->showCreateModel = false;
        $this->resetExcept('categories');
        $this->resetValidation();
        $this->resetErrorBag();
    }

    protected function rules()
    {
        return [
            'name'      => ['required','string',Rule::unique(Category::class)],
        ];
    }
    

    public function create(){
        $this->validate();

        $data = [
            'name'  =>  $this->name,
            'price' =>  $this->price,
        ];

        $pack = Pack::create($data);
        foreach ($this->productQuantities as $productQuantity) {
            Variation::create([
                'product_id'    => $productQuantity['product_id'],
                'quantity'      =>   $productQuantity['quantity'],
                'pack_id'       =>  $pack->id
            ]);
        }


        $this->closeCreateModel();
        $this->dispatch('refreshParent');

    }



    public function render()
    {
        $products = Product::pluck('name','id');
        return view('livewire.pack.pack-create',[
            'products'  =>  $products
        ]);
    }
}
