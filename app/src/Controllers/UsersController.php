<?php

namespace App\Controllers;

use App\Models\User;

class UsersController
{
    public function show($container, $request)
    {
        $user = new User($container);
        $user->create(['name' => 'Paulinho']);
        return $user->get($request->attributes->get(1));
    }
}
