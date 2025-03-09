<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 */
abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Set Model
     */
    public function setModel(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all records
     */
    public function all()
    {
        return $this->model->all();
    }
}
