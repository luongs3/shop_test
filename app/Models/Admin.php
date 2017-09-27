<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Admin
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'email',
        'avatar',
        'password',
        'is_super',
        'is_active',
        'reset_token',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
