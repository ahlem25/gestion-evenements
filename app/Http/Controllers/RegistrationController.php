<?php

namespace App\Http\Controllers;

use App\DataTables\RegistrationDataTable;
use App\Http\Requests\CreateRegistrationRequest;
use App\Http\Requests\UpdateRegistrationRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\RegistrationRepository;
use Illuminate\Http\Request;
use App\Mail\EventRegistrationConfirmation;
use Illuminate\Support\Facades\Mail;
use Flash;
use App\Models\Event;
class RegistrationController extends AppBaseController
{
    /** @var RegistrationRepository $registrationRepository*/
    private $registrationRepository;

    public function __construct(RegistrationRepository $registrationRepo)
    {
        $this->registrationRepository = $registrationRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Registration.
     */
    public function index(RegistrationDataTable $registrationDataTable)
    {
    return $registrationDataTable->render('registrations.index');
    }


    /**
     * Show the form for creating a new Registration.
     */
    public function register(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);
        $user = auth()->user(); // Get the logged-in user

        // Check if the user is already registered for the event
        if ($event->users()->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'You are already registered for this event.');
        }

        // Check if the event has reached its maximum capacity
        $currentRegistrationsCount = $event->users()->count(); // Get the number of users registered for the event

        if ($currentRegistrationsCount >= $event->max_capacity) {
            return redirect()->back()->with('error', 'Sorry, this event has reached its maximum capacity.');
        }

        // Register the user for the event
        $event->users()->attach($user->id, ['registration_date' => now()]);

        // Send the confirmation email to the user
        Mail::to($user->email)->send(new EventRegistrationConfirmation($user, $event));

        return redirect()->route('events.index')->with('success', 'You have successfully registered for the event!');
    }

    /**
     * Display the specified Registration.
     */
    public function show($id)
    {
        $registration = $this->registrationRepository->find($id);

        if (empty($registration)) {
            Flash::error('Registration not found');

            return redirect(route('registrations.index'));
        }

        return view('registrations.show')->with('registration', $registration);
    }

}
