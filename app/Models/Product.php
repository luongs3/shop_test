<?php
namespace App\Models;

class Product
{
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
