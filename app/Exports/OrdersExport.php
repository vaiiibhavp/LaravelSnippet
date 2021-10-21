<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromArray, WithHeadings
{
    protected $orders;

    public function headings(): array
    {
        return [
            'order_id',
            'order type',
            'Chef Id',
            'chef name',
            // 'restaurant_id',
            'Created Date',
            'Created Time',
            'Order Status',
			'PENDING',
			'CHEF PENDING',
			'CHEF ACCEPTED',
			'CHEF REJECTED',
			'DELIVERED',
			'DRIVER PENDING',
			'DRIVER ACCEPTED',
			'DRIVER REJECTED',
			'PREPARED',
			'PICKED UP',
			'Re-Scheduled',
          	'delivery date',
            'delivery status',
            'Customer ID',
            'customer name',
            'Customer Address',
            'Customer to chef distance',
            'Item Ordered',
            'Occasion',
            // 'client_id',
            // 'table_name',
            // 'table_id',
            'area_name',
            // 'area_id',
            // 'address',
            // 'address_id',
            'driver name',
            // 'driver_id',
            'subtotal',
            'delivery price',
            'commission',
            'Discount coupon',
            'Discount applied',
            'Total payment',
            'payment method',
            'Online payment detail'
            // 'srtipe_payment_id',
            // 'order_fee',
            // 'restaurant_fee',
            // 'restaurant_static_fee',
            // 'vat',
        ];
    }

    public function __construct(array $orders)
    {
        $this->orders = $orders;
    }

    public function array(): array
    {
        return $this->orders;
    }
}
