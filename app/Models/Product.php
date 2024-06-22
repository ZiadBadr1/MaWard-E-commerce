<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'quantity', 'color', 'special_text', 'special_text_price', 'special_image', 'special_image_price', 'category_id', 'brand_id', 'occasion_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function occasion(): BelongsTo
    {
        return $this->belongsTo(Occasion::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function excerpt(): string
    {
        return Str::limit(strip_tags(html_entity_decode($this->description)),100);
    }

    public function favoritedByUsers():BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'user_favs', 'product_id', 'user_id');
    }
}
