<?php
namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $guard = 'client';

    public function show(User $user)
    {
        $user = $user->load(['products']);

        return [
            'user' => $user,
        ];
    }

    public function getMe()
    {
        return auth()->user() ? : response(['user' => null]);
    }
        
}
