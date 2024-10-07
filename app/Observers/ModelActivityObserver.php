<?php

namespace App\Observers;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class ModelActivityObserver
{
    // Handle the "created" event
    public function created($model): void
    {
        $this->logActivity($model, 'created', [], $model->getAttributes());
    }

    // Handle the "updated" event
    public function updated($model): void
    {
        $this->logActivity($model, 'updated', $model->getOriginal(), $model->getChanges());
    }

    // Handle the "deleted" event
    public function deleted($model): void
    {
        $this->logActivity($model, 'deleted', $model->getAttributes(), []);
    }

    // Helper to log the activity
    protected function logActivity($model, $action, $oldData, $newData): void
    {
        ActivityLog::create([
            'user_id' => Auth::id(),
            'model' => get_class($model),
            'model_id' => $model->id,
            'action' => $action,
            'old_data' => $oldData,
            'new_data' => $newData,
        ]);
    }
}

