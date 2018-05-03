@component('mail::message')
# New trip request from your website

You have received a trip request on your site.

## The details are below: ##

**Name**: {{ $serviceRequest->name }}

**Email**: {{ $serviceRequest->email }}

**Phone**: {{ $serviceRequest->phone }}

**Trip requested**: {{ $service->title }}

**Requested date**: {{ $serviceRequest->requested_date }}

**Guests**: {{ $serviceRequest->guests }}

**Comments**: {{ $serviceRequest->comments }}

Thanks,<br>
Kerigan Marketing Associates
@endcomponent
