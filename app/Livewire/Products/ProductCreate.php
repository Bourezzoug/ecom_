<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductCreate extends Component
{
    use WithFileUploads;

    public $gallery,$price,$new_price,$quantity,$percentage,$typeQuantity,$unityQuantity,$categorieID,$name,$extract,$body,$photo,$alt,$meta_description;

    protected $listeners = ['bodyUpdated','priceUpdate','slugUpdated'];

    public string $reduction = '';

    public function priceUpdate() {
        $this->percentage = 10;
    }

    protected function rules()
    {
        $rules =  [
            'name'              =>  ['required', 'string', Rule::unique(Product::class)],
            'price'             =>  ['required','numeric'],
            'quantity'          =>  ['required','numeric'],
            'typeQuantity'      =>  ['required','string'],
            'unityQuantity'     =>  ['nullable','numeric'],
            'categorieID'       =>  ['required','numeric'],
            'body'              =>  ['required', 'string'],
            'extract'           =>  ['required', 'string'],
            'photo'             =>  'required|image|mimes:jpeg,png,jpg,webp',
            'alt'               =>  ['required', 'string',  ],
            'meta_description'  =>  ['required','string'],
            'gallery'           =>  ['nullable','string'],
            'new_price'         =>  ['nullable','numeric'],
            'percentage'        =>  ['nullable','numeric'],
        ];
        return $rules;
    }


    public function create(){
        // $this->validate();
        // dd($this->variations);
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
            $upload_path = public_path('storage/products');
            
            // Create directory if it doesn't exist
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0755, true);
            }
            
            $filename = $this->photo->getClientOriginalName();
            $img->save($upload_path . DIRECTORY_SEPARATOR . $filename);
            $data['main_image'] = 'storage/products/' . $filename;
        }

        if (!empty($this->gallery)) {
            $urls = [];
            foreach ($this->gallery as $image) {
                $url = $image->store('products', 'public');
                $urls[] = '/storage/' . $url;
            }
            $data['gallery_images'] = implode(',',$urls);
        }

        Product::create($data);

        return redirect()->route('admin.products');
        // dd($this->percentage);
    }

    public function deleteImage($index)
    {
        unset($this->gallery[$index]);
        $this->gallery = array_values($this->gallery); // Reindex the array
    }

    public function render()
    {
        $categories = Category::pluck('name', 'id');
        return view('livewire.products.product-create',[
            'categories'    =>  $categories,
        ]);
    }
}
