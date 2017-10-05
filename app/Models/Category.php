<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'name',
    	'sku',
        'ancestor_id',
        'featured',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getRouteKeyName()
    {
        return 'sku';
    }

    public function ancestor()
    {
        return $this->belongsTo(static::class, 'ancestor_id');
    }

    public function descendants()
    {
        return $this->hasMany(static::class, 'ancestor_id');
    }

    public function scopeIsFeatured($query)
    {
        return $query->where('featured', 1);
    }
}
