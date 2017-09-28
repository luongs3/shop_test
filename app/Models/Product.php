<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable= [
        'name',
        'sku',
        'description',
        'status',
        'category_id',
        'price',
        'sale_price',
        'sale_off',
        'brand',
        'image',
        'extra_images',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getExtraImagesAttributes()
    {
        return unserialize($this->attributes['extra_images']);
    }

    public function SetExtraImagesAttributes($value)
    {
        $this->attributes['extra_images'] = serialize($value);
    }

    public function getRouteKeyName()
    {
        return 'sku';
    }

    public function attributes()
    {
        return $this->belongsToMany(AttributeProduct::class, 'attribute_products');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
