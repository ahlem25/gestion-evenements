<?php

namespace App\Repositories;

use App\Models\Event;

class EventRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'date',
        'location',
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Event::class;
    }
}
