<?php

namespace App\Service;

use App\Actions\Images\DeleteImageAction;
use App\Actions\Images\StoreImageAction;
use App\Models\Category;

class CategoryService
{
    public function getAll(): \LaravelIdea\Helper\App\Models\_IH_Category_C|array|\Illuminate\Pagination\LengthAwarePaginator
    {
        return Category::paginate(10);
    }

    public function create(array $attributes) : Category
    {
        $attributes['icon'] = (new StoreImageAction())->execute($attributes['icon'],'admin/category');
        return Category::create($attributes);
    }

    public function update(array $attributes , Category $category): void
    {
        if(isset($attributes['icon'])) {
            $attributes['icon'] = (new StoreImageAction())->execute(($attributes['icon']), 'admin/category');
            (new DeleteImageAction())->execute($category->icon);
        }
        $category->update($attributes);
    }

    public function delete(Category $category): void
    {
        $category->delete();
    }
}