<?php

namespace App\Http\Service\Order;

use App\Models\Order;
use Illuminate\Support\Collection;

class OrderService
{
    public function store(Collection $order): Collection
    {
        $collection = Order::create([
            'user_id' => $order->get('user_id'),
            'amount' => $order->get('amount'),
        ]);

        return Collection::make($collection);
    }
}
