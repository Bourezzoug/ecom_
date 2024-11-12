<?php

namespace App\Livewire\Order;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;

class OrderExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    protected $orderId;

    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }

    public function query()
    {
        return Order::query()->where('id', $this->orderId);
    }

    public function map($order): array
    {
        return [
            'id' => $order->id,
            'customer_name' => $order->customer_name,
            'total' => $order->total,
            'status' => $order->status,
            'created_at' => $order->created_at->format('Y-m-d H:i:s'),
            // Add more fields as needed based on your Order model
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Customer Name',
            'Total',
            'Status',
            'Created At',
            // Add more headings to match your fields
        ];
    }
}