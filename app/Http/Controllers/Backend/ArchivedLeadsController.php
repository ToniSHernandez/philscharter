<?php

namespace App\Http\Controllers\Backend;

use App\Lead;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArchivedLeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $important = $request->important === 'true';

        $leads = Lead::archived()->when($important, function ($query) {
            return $query->where('important', 1);
        })->with(['service', 'serviceRequest'])->orderBy('created_at', 'DESC')->paginate(5);

        foreach ($leads as $lead) {
            $lead->diff = Carbon::parse($lead->created_at)->diffForHumans();
        }

        return $leads;
    }
}
