<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;




class EventController extends Controller
{
    public  function home(){
        $events=auth()->user()->events()->get();
        return view('dashboard')->with('events', $events);
    }


    public function create()
    {
        return view('add-event');
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_type' => 'required|string|max:255',
            'event_description' => 'required|string',
            'start_date' => 'required|Date|after:today',
            'end_date' => 'required|Date|after:start_date',
            'time' => 'required',
            'venue' => 'required',
            'city' => 'required',
            'state' => 'required',

            'featured_speakers' => 'nullable|string',
            'website' => 'nullable|URL',
            'sponsors' => 'nullable|string',
            'facebook' => 'nullable|URL',
            'twitter' => 'nullable|URL',
            'linkedin' => 'nullable|URL',
            'instagram' => 'nullable|url',
            'logo' => 'nullable|image',
            'sponsor_images' => 'nullable|image',
            'upload_speaker' => 'nullable|image',

            'firstname'=> 'required',
            'lastname'=> 'required',
            'companyname'=> 'nullable',
            'email'=> 'required|email|max:255',
            'phone_number' => 'required|min:11|numeric',
        ]);

        auth()->user()->events()->create($request->all());

        return redirect()->route('dashboard')->with('message', 'Event Created Successfully');
    }
    public function eventDetail($id){
       $event = Event::findOrFail($id);

       return view('event-detail')->with('event' , $event);
    }
}
