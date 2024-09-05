<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Service\User\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(protected UserService $userService) {}

    public function __invoke(UserRequest $request): JsonResponse
    {
        $data = $request->collect();

        $result = $this->userService->store($data);

        return response()->json([
            "message" => $result
        ]);
    }
}
