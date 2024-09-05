<?php

namespace App\Http\Controllers;


use App\Http\Requests\AnalyzeRequest;
use App\Http\Service\Analyze\AnalyzeService;
use Illuminate\Http\JsonResponse;

class   AnalyzeController extends Controller
{
    public function __construct(protected AnalyzeService $analyzeService) {}

    public function __invoke(AnalyzeRequest $request): JsonResponse
    {
        $data = $request->collect();

        $result = $this->analyzeService->analyze($data);

        return response()->json([
            'message' => $result
        ]);
    }
}
