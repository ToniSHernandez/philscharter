<?php

namespace App\Mail;

use App\ServiceRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Service;

class TripRequested extends Mailable
{
    use Queueable, SerializesModels;

    public $serviceRequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ServiceRequest $serviceRequest)
    {
        $this->serviceRequest = $serviceRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $service = Service::find($this->serviceRequest->service_id);
        return $this->from('noreply@mg.philscharterservice.com')
                    ->markdown('emails.trips.requested')
                    ->with([
                        'service' => $service
                    ]);
    }
}
