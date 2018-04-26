<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripRequestController extends Controller
{
    public function create(Request $request)
    {
        $requestedDate = $request->requested_date ?? null;
        $guests        = $request->guests ?? null;
        $serviceId     = $request->service_id ?? null;

        return view('service-request', compact('requestedDate', 'guests', 'serviceId'));
    }
}
