<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ProductUpdate extends Component
{
    public $itemId;
    public $gallery,$gallery_path,$price,$new_price,$quantity,$percentage,$typeQuantity,$unityQuantity,$categorieID,$name,$extract,$body,$photo,$photo_path,$alt,$meta_description;
    public string $reduction = '';

    public function mount($id) {
        $item = Product::find($id);
        $this->itemId = $id;
        $this->name = $item->name;
        $this->quantity = $item->quantity;
        $this->typeQuantity = $item->typeQuantity;
        $this->unityQuantity = $item->unityQuantity;
        $this->price = $item->price;
        $this->categorieID = $item->category_id;
        $this->extract = $item->extract;
        $this->body = $item->description;
        $this->photo_path = $item->main_image;
        $this->gallery_path = $item->gallery_images;
        $this->alt = $item->alt;
        $this->percentage = $item->percentage;
        $this->meta_description = $item->meta_description;

        if($this->percentage != null) {
            $this->reduction = 'Oui';
        }
        else {
            $this->reduction = 'Non';
        }

        $this->new_price = $this->price - ($this->price * ($this->percentage / 100));

    }


    public function edit(){
        // $this->validate();
        $productPrice;
        if($this->percentage != null) {
            $productPrice = $this->price - ($this->price * ($this->percentage / 100));
        }
        else {
            $productPrice = $this->price;
        }

        $data = [
            'name'              =>  $this->name ,
            'slug'              =>  Str::slug($this->name),
            'price'             =>  $productPrice,
            'quantity'          =>  $this->quantity,
            'typeQuantity'      =>  $this->typeQuantity,
            'unityQuantity'     =>  $this->unityQuantity,
            'category_id'       =>  $this->categorieID,
            'description'       =>  $this->body,
            'extract'           =>  $this->extract,
            'alt'               =>  $this->alt,
            'meta_description'  =>  $this->meta_description,
            'percentage'        =>  $this->percentage,
        ];

        if (!empty($this->photo)) {
            $img = Image::make($this->photo);
            $upload_path = public_path('storage/Products') . DIRECTORY_SEPARATOR;
            $filename = $this->photo->getClientOriginalName();
            $img->save($upload_path . $filename);
            $data['image'] = 'storage/Products/' . $filename;
        }

        if (!empty($this->gallery)) {
            $urls = [];
            foreach ($this->gallery as $image) {
                $url = $image->store('Products', 'public');
                $urls[] = '/storage/' . $url;
            }
            $data['gallery_images'] = implode(',',$urls);
        }


        Product::where('id',$this->itemId)->update($data);

        // Product::update($data);
        return redirect()->route('admin.products');


    }

    public function deleteImage($index)
    {
        unset($this->gallery[$index]);
        $this->gallery = array_values($this->gallery); // Reindex the array
    }


    public function render()
    {
        $categories = Category::pluck('name', 'id');
        return view('livewire.products.product-update',[
            'categories'    =>  $categories,
        ]);
    }
}
