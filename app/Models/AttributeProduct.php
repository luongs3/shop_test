<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeProduct extends Model
{
    protected $fillable = [
        'product_id',
        'attribute_id',
    ];
}
