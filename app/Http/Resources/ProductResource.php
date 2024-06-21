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
            'special_text_pric  e' => $this->special_text_price,
            'special_image' => $this->special_image,
            'special_image_price' => $this->special_image_price,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'brand' => new BrandResource($this->whenLoaded('brand')),
            'occasion' => new OccasionResource($this->whenLoaded('occasion')),
            'images' => ProductImageResource::collection($this->whenLoaded('images')),
            'updated_at' => $this->updated_at->toDateTimeString(),
            'created_at' => $this->created_at->toDateTimeString()
    ];
    }
}
