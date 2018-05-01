<?php

namespace App\Http\Controllers\Backend;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exceptions\NoServicesException;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        if (count($services) == 0 ) {
            throw new NoServicesException();
        }

        return $services;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'rate' => 'required|numeric'
        ]);
        $photoUrl = $request->file('photo') ? $request->file('photo')->store('service_photos') : null;

        $title = $request->title;
        $slug = str_slug($title, '-');
        $featured = $request->featured === 'true' ? true : false;

        Service::create([
            'title' => $title,
            'slug' => $slug,
            'subtitle' => $request->subtitle,
            'rate' => $request->rate,
            'rate_info' => $request->rate_info,
            'description' => $request->description,
            'photo_url' => $photoUrl,
            'featured' => $featured
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return $service;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $photoUrl = $request->file('photo') ? $request->file('photo')->store('service_photos'): null;
        $title    = $request->title ?? $service->title;
        $slug     = str_slug($title, '-');
        $featured = $request->featured ?? $service->featured;

        $service->update([
            'title'       => $title,
            'subtitle'    => $request->subtitle ?? $service->subtitle,
            'slug'        => $slug,
            'rate'        => $request->rate ?? $service->rate,
            'rate_info'   => $request->rate_info ?? $service->rate_info,
            'photo_url'   => $photoUrl,
            'description' => $request->description ?? $service->description,
            'featured'    => $featured

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
    }
}
