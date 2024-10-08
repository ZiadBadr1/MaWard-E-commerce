<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'color' => $this->color,
            'special_text' => $this->special_text,
            'special_text_price' => $this->special_text_price,
            'special_image' => $this->special_image,
            'special_image_price' => $this->special_image_price,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'brand' => new BrandResource($this->whenLoaded('brand')),
            'occasion' => new OccasionResource($this->whenLoaded('occasion')),
            'images' => ProductImageResource::collection($this->whenLoaded('images')),
            'is_favorite' => $this->isFavorite(),
            'updated_at' => $this->updated_at->toDateTimeString(),
            'created_at' => $this->created_at->toDateTimeString()
    ];
    }

    /**
     * Check if the product is a favorite for the current user.
     *
     * @return bool
     */
    private function isFavorite(): bool
    {
        $user = auth()->guard('user')->user();

        if (!$user) {
            return false;
        }

        return $user->favoriteProducts()->where('product_id', $this->id)->exists();
    }
}
