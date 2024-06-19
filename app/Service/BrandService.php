<?php

namespace App\Service;

use App\Actions\Images\DeleteImageAction;
use App\Actions\Images\StoreImageAction;
use App\Models\Brand;

class BrandService
{
    public function getAll(): \LaravelIdea\Helper\App\Models\_IH_Brand_C|\Illuminate\Pagination\LengthAwarePaginator|array
    {
        return Brand::paginate(10);
    }

    public function create(array $attributes) : Brand
    {
        $attributes['icon'] = (new StoreImageAction())->execute($attributes['icon'],'admin/Brand');
        return Brand::create($attributes);
    }

    public function update(array $attributes , Brand $brand): void
    {
        if(isset($attributes['icon'])) {
            $attributes['icon'] = (new StoreImageAction())->execute(($attributes['icon']), 'admin/brand');
            (new DeleteImageAction())->execute($brand->icon);
        }
        $brand->update($attributes);
    }

    public function delete(Brand $brand): void
    {
        $brand->delete();
    }
}