<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'ancestor_id',
        'commentable_id',
        'commentable_type',// post, product, comment
        'active', //0-inactive, 1-active
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function ancestor()
    {
        return $this->belongsTo(static::class, 'ancestor_id');
    }

    public function descendants()
    {
        return $this->hasMany(static::class, 'ancestor_id');
    }
}
