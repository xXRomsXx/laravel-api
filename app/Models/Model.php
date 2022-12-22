<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Facades\Gate;

/**
 * @property int $id
 * 
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
abstract class Model extends EloquentModel
{
    public function getCanAttribute(): array
    {
        return [
            'read'   => Gate::allows('read', $this),
            'update' => Gate::allows('update', $this),
            'delete' => Gate::allows('delete', $this)
        ];
    }

    public function getTypeResourceAttribute(): string
    {
        return $this->getTable();
    }
}
