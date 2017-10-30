<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Base\UserController as BaseUserController;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseUserController
{
    protected $guard = 'client';

    public function show(User $user)
    {
        $user = $user->load(['products']);

        return [
            'user' => $user,
        ];
    }
}
