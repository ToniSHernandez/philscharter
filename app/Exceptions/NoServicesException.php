<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class NoServicesException extends Exception
{
    public function render(Request $request)
    {
        return response()->json(['message' => 'There are no services to show'], 417);
    }
}
