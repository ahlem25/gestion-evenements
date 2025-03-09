<?php

namespace App\Http\Controllers;

use App\DataTables\EventDataTable;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Str;
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
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = Str::random(40) . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('events_images', $imageName, 'public');
            $input['image'] = asset('storage/' . $path);
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
        $event = $this->eventRepository->find($id, ['*'], ['registrations.user']);

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
        $data = $request->all();

        // begin image section
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            //delete old
            $exists = Storage::disk('public')->exists('events_images', $event->image);
            if($exists)
            {
                $file = basename($event->image);
                Storage::disk('public')->delete('events_images/'.$file);
            }
            // end delete bloc
            $imageName = Str::random(40) . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('events_images', $imageName, 'public');
            $data['image'] = asset('storage/' . $path);
        }
        // end image section
        $event = $this->eventRepository->update($data, $id);

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
