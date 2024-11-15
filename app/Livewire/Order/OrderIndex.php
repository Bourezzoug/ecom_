<?php

namespace App\Livewire\Order;

use Livewire\Component;
use App\Models\Order;
use Maatwebsite\Excel\Facades\Excel;
use App\Livewire\Order\OrderExport;
use Rap2hpoutre\FastExcel\FastExcel;

class OrderIndex extends Component
{
    public ?string $term = null;

    public $selectedOrders = [];
    
    public $selecteAll = false;

    protected $listeners = [ 'refreshParent' => '$refresh'];

    public int $perPage = 10;

    public string $orderBy = 'id';
    public string $sortBy = 'asc';
    public string $type = '';

    public $readyToLoad = false;

    public function loadItems()
    {
        $this->readyToLoad = true;
    }

    public function deleteSelected() {
        Order::query()->whereIn('id',$this->selectedOrders)->forceDelete();
        $this->selectedOrders = [];
        $this->selecteAll = false;
    }

    public function updatedSelecteAll($value) {
        if($value) {
            $this->selectedOrders = $this->getItem()->pluck('id');
        }
        else{
            $this->selectedOrders = [];
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
        elseif ($action == 'export') {
            return $this->exportToExcel($itemId);
        }
    }


    public function exportToExcel($orderId)
    {
        try {
            $order = Order::where('id', $orderId)->first();
            $items = collect(json_decode($order->products_cart, true));
            
            $productData = $items->flatMap(function($item) use ($order) {
                // Base order information
                $baseData = [
                    'ID' => $order->id,
                    'Full Name' => $order->first_name . ' ' . $order->family_name,
                    'Address' => $order->address,
                    'Phone' => $order->phone_number,
                    'City' => $order->city,
                    'State/Province' => $order->state_province,
                    'Postal Code' => $order->postal_code,
                    'Total Price' => $order->total_price,
                    'Status' => $order->status,
                    'Created At' => $order->created_at ? $order->created_at->format('Y-m-d H:i:s') : ''
                ];
    
                // Check if the item is a pack or a product
                if (isset($item['pack_name'])) {
                    // Pack item
                    return [[
                        ...$baseData,
                        'Type' => 'Pack',
                        'Name' => $item['pack_name'],
                        'Price' => $item['pack_price'],
                        'Quantity' => 1,
                    ]];
                } else {
                    // Product item
                    return [[
                        ...$baseData,
                        'Type' => 'Product',
                        'Name' => $item['product'],
                        'Price' => $item['price'],
                        'Quantity' => $item['quantity'],
                    ]];
                }
            });
    
            $filename = 'order_' . $orderId . '_' . date('Y-m-d_His') . '.xlsx';
            return response()->streamDownload(function() use ($productData) {
                (new FastExcel($productData))->export('php://output');
            }, $filename);
        } catch (\Exception $e) {
            $this->dispatch('showAlert', [
                'type' => 'error',
                'message' => 'Error exporting order: ' . $e->getMessage()
            ]);
            return null;
        }
    }
    
    public function exportCSV()
    {
        try {
            $orders = Order::all();
            $orderData = $orders->flatMap(function($order) {
                $items = collect(json_decode($order->products_cart, true));
                
                return $items->map(function($item) use ($order) {
                    // Base order information
                    $baseData = [
                        'ID' => $order->id,
                        'Full Name' => $order->first_name . ' ' . $order->family_name,
                        'Address' => $order->address,
                        'Phone' => $order->phone_number,
                        'City' => $order->city,
                        'State/Province' => $order->state_province,
                        'Postal Code' => $order->postal_code,
                        'Total Price' => $order->total_price,
                        'Status' => $order->status,
                        'Created At' => $order->created_at ? $order->created_at->format('Y-m-d H:i:s') : ''
                    ];
    
                    // Check if the item is a pack or a product
                    if (isset($item['pack_name'])) {
                        // Pack item
                        return [
                            ...$baseData,
                            'Type' => 'Pack',
                            'Name' => $item['pack_name'],
                            'Price' => $item['pack_price'],
                            'Quantity' => 1,
                        ];
                    } else {
                        // Product item
                        return [
                            ...$baseData,
                            'Type' => 'Product',
                            'Name' => $item['product'],
                            'Price' => $item['price'],
                            'Quantity' => $item['quantity'],
                        ];
                    }
                });
            });
    
            $filename = 'orders_' . date('Y-m-d_His') . '.xlsx';
            return response()->streamDownload(function() use ($orderData) {
                (new FastExcel($orderData))->export('php://output');
            }, $filename);
        } catch (\Exception $e) {
            $this->dispatch('showAlert', [
                'type' => 'error',
                'message' => 'Error exporting orders: ' . $e->getMessage()
            ]);
            return null;
        }
    }


    public function getItem(){
        $orders = Order::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $orders = $orders->search(trim($this->term));
        }


        $orders = $orders->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $orders;
    }

    public function render()
    {
        return view('livewire.order.order-index',[
            'orders' => $this->readyToLoad ? $this->getItem() : [],
        ]);
    }
}
