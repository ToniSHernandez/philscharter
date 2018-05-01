<?php

namespace App\Http\Controllers\Backend;

use App\TripRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceRequest;
use App\Lead;

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
        Lead::create([
            'service_id' => $request->service_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->comments,
            'requested_date' => $request->requested_date,
            'active' => true,
            'important' => false
        ]);

        return ServiceRequest::create($request->all());
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
