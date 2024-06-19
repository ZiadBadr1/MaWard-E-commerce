<?php

namespace App\Service;

use App\Actions\Images\DeleteImageAction;
use App\Actions\Images\StoreImageAction;
use App\Models\Occasion;

class OccasionService
{
    public function getAll(): array|\LaravelIdea\Helper\App\Models\_IH_Occasion_C|\Illuminate\Pagination\LengthAwarePaginator
    {
        return Occasion::paginate(10);
    }

    public function create(array $attributes) : Occasion
    {
        $attributes['icon'] = (new StoreImageAction())->execute($attributes['icon'],'admin/occasion');
        return Occasion::create($attributes);
    }

    public function update(array $attributes , Occasion $occasion): void
    {
        if(isset($attributes['icon'])) {
            $attributes['icon'] = (new StoreImageAction())->execute(($attributes['icon']), 'admin/occasion');
            (new DeleteImageAction())->execute($occasion->icon);
        }
        $occasion->update($attributes);
    }

    public function delete(Occasion $occasion): void
    {
        $occasion->delete();
    }
}