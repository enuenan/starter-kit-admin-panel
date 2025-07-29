<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    public bool $lazyLoad = FALSE;
    public bool $filterable = TRUE;
    protected Model $baseModel;

    public function __construct(?Model $model = null)
    {
        if ($model) {
            $this->baseModel = $model;
        }
    }

    /**
     * Used in controller to lazy load and apply filter on queried data
     * Need to call this method first after instantiating class to apply lazy loading
     */
    public function lazyload($isFilterable = TRUE)
    {
        $this->lazyLoad = TRUE;
        $this->filterable = $isFilterable;
        return $this;
    }

    public function baseCreate(array $data): Model
    {
        $model = $this->baseModel->create($data);
        $model->refresh();

        return $model;
    }

    public function baseUpdate(Model $model, array $data): bool
    {
        $updated = $model->update($data);
        $model->refresh();

        return $updated;
    }

    public function baseDelete(Model $model): bool
    {
        return $model->delete();
    }
}
