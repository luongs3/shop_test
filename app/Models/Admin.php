<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
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
