<?php

namespace App\Http\Controllers;

use App\DataTables\EventDataTable;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
class EventController extends AppBaseController
{
    /** @var EventRepository $eventRepository*/
    private $eventRepository;

    public function __construct(EventRepository $eventRepo)
    {
        $this->eventRepository = $eventRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Event.
     */
    public function index(EventDataTable $eventDataTable)
    {
    return $eventDataTable->render('events.index');
    }


    /**
     * Show the form for creating a new Event.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created Event in storage.
     */
    public function store(CreateEventRequest $request)
    {
        $input = $request->all();

        // begin image section
        if($request->file('image'))
        {
            $path = Storage::disk('public')->put('events_images',$request->file('image'));
            $input->fill(['image'=> asset($path)]);
        }
        // end image section

        $event = $this->eventRepository->create($input);

        Flash::success('Event saved successfully.');

        return redirect(route('events.index'));
    }

    /**
     * Display the specified Event.
     */
    public function show($id)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        return view('events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified Event.
     */
    public function edit($id)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        return view('events.edit')->with('event', $event);
    }

    /**
     * Update the specified Event in storage.
     */
    public function update($id, UpdateEventRequest $request)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        $event = $this->eventRepository->update($request->all(), $id);

        // begin image section
        if($request->file('image'))
        {
            //delete old
            $exists = Storage::disk('public')->exists('events_images',$event->image);

            if($exists)
            {
                $file = basename($event->image);
                Storage::disk('public')->delete('events_images/'.$file);
            }
        }
        // end image section

        Flash::success('Event updated successfully.');

        return redirect(route('events.index'));
    }

    /**
     * Remove the specified Event from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        // delete event image
        $exists = Storage::disk('public')->exists('events_images',$event->image);

        if($exists)
        {
            $file = basename($event->image);
            Storage::disk('public')->delete('events_images/'.$file);
        }

        $this->eventRepository->delete($id);

        Flash::success('Event deleted successfully.');

        return redirect(route('events.index'));
    }
}
