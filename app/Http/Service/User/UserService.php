<?php

namespace App\Http\Service\User;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function store(Collection $collection): Collection
    {
        $data = User::create([
            'name' => $collection['name'],
            'email' => $collection['email'],
            'password' => Hash::make($collection['password']),
        ]);

        return Collection::make([$data]);
    }
}
