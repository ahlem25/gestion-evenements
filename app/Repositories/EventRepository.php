<?php

namespace App\Repositories;

use App\Models\Event;

class EventRepository
{
    /**
     * Retourne tous les événements paginés.
     *
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginateEvents($perPage = 10)
    {
        return Event::paginate($perPage);
    }

    /**
     * Retourne un événement par son ID.
     *
     * @param int $id
     * @return \App\Models\Event|null
     */
    public function find($id)
    {
        return Event::find($id);
    }

    /**
     * Crée un nouvel événement.
     *
     * @param array $data
     * @return \App\Models\Event
     */
    public function create(array $data)
    {
        return Event::create($data);
    }

    /**
     * Met à jour un événement existant.
     *
     * @param array $data
     * @param int $id
     * @return \App\Models\Event
     */
    public function update(array $data, $id)
    {
        $event = Event::find($id);
        $event->update($data);
        return $event;
    }

    /**
     * Supprime un événement.
     *
     * @param int $id
     * @return bool|null
     */
    public function delete($id)
    {
        $event = Event::find($id);
        return $event->delete();
    }
}

