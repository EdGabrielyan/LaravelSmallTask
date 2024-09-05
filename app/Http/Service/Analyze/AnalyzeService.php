<?php

namespace App\Http\Service\Analyze;

use App\Enum\TimeEnum;
use App\Models\Order;
use Illuminate\Support\Collection;

class AnalyzeService
{
    public function analyze(Collection $collection): Collection
    {
        $orders = Order::query()
            ->when($collection->get('start_date'), function ($query) use ($collection) {
                $query->whereBetween('created_at', [$collection->get('start_date'), $collection->get('end_date')]);
            })
            ->when($collection->get('user_id'), fn($query) => $query->where('user_id', $collection->get('user_id')))
            ->orderBy('created_at')
            ->get()
            ->groupBy(fn($item) => $item->created_at->format(TimeEnum::format($collection->get('order_by'))))
            ->transform(fn($collection) => [
                'count' => $collection->count(),
                'amount' => $collection->sum('amount'),
            ]);

        return Collection::make($orders);
    }
}
