<?php

namespace App\Livewire\Order;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReviewMail;

class OrderUpdate extends Component
{
    public $showUpdateModel = false;
    public $itemId;
    public $order,$status;

    protected $listeners = ['showUpdateModel'];

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;
        if (!empty($this->itemId)){
            $this->order = Order::find($this->itemId);

        }
    }

    public function edit(){
        $order = Order::where('id', $this->itemId)->first();
        if ($this->status !== null) { // Check if status has a value
            $data = [
                'status' => $this->status,
            ];
            $order->update($data);
        }

        if($this->status == 'paid') {
            Mail::to($order->email)->send(new ReviewMail($order->email));
        }
    
        $this->closeUpdateModel();
        $this->dispatch('refreshParent');
    }
    
    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->reset();
    }
    public function render()
    {
        return view('livewire.order.order-update');
    }
}
