<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Service\Order\OrderService;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function __construct(protected OrderService $orderService) {}

    public function __invoke(OrderRequest $request): JsonResponse
    {
        $data = $request->collect();

        $result = $this->orderService->store($data);

        return response()->json([
              'message' => $result
        ]);
    }
}
