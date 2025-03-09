<?php

namespace App\Repositories;

use App\Models\Event;
use App\Repositories\BaseRepository;
//use InfyOm\Generator\Common\BaseRepository as InfyOmBaseRepository;
class EventRepository extends BaseRepository
{
    public function __construct(Event $event)
    {
        $this->setModel($event);
    }

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
