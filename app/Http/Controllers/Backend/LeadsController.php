<?php

namespace App\Http\Controllers\Backend;

use App\Lead;
use App\User;
use Carbon\Carbon;
use App\Mail\LeadCreated;
use App\Mail\LeadReceived;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $important = $request->important === 'true';
        return Lead::active()->when(
            $important,
            function ($query) {
                return $query->where('important', 1);
            }
        )->with(['service', 'serviceRequest'])->latest()->paginate(5);
    }

    public function show(Lead $lead)
    {
        $lead = Lead::where('id', $lead->id)->with(['service', 'serviceRequest'])->first();

        return $lead;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request The request object
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:190',
            'phone' => 'required|max:15',
            'message' => 'required',
            'requested_date' => 'required'
        ]);

        // $admin = User::admin();
        $lead = Lead::create($request->all());
        // $emailConfirmation = (new LeadCreated($lead))
        //     ->onQueue(config('queue.connections.redis.queue'));
        // $leadNotification = (new LeadReceived($lead))
        //     ->onQueue(config('queue.connections.redis.queue'));


        // Mail::to($request->email)->send($emailConfirmation);
        // Mail::to($admin->email)->send($leadNotification);

        return $lead;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        $lead->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();
    }
}
