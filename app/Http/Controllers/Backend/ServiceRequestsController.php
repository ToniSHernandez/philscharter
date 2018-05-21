<?php

namespace App\Http\Controllers\Backend;

use App\Lead;
use App\User;
use App\TripRequest;
use App\ServiceRequest;
use App\Mail\TripRequested;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ServiceRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ServiceRequest::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: Move to a Job
        $lead = Lead::create([
            'service_id'     => $request->service_id,
            'name'           => $request->name,
            'phone'          => $request->phone,
            'email'          => $request->email,
            'message'        => $request->comments,
            'active'         => true,
            'important'      => false,
            'requested_date' => $request->requested_date
        ]);

       $serviceRequest = ServiceRequest::create($request->all());
       $lead->service_request_id = $serviceRequest->id;
       $lead->save();

       if (config('app.env') !== 'testing') {
            Mail::to(env('CLIENT_EMAIL'))
                ->bcc(['daron@kerigan.com', 'jack@kerigan.com'])
                ->replyTo(env('CLIENT_EMAIL'))
                ->send(new TripRequested($serviceRequest));
       }

        return $serviceRequest;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TripRequest  $tripRequest
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceRequest $serviceRequest)
    {
        return $serviceRequest;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TripRequest  $tripRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceRequest $serviceRequest)
    {
        $serviceRequest->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TripRequest  $tripRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceRequest $serviceRequest)
    {
        $serviceRequest->delete();
    }
}
