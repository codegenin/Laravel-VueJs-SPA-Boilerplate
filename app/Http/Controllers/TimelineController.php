<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'data' => 'completed'
        ]);
    }
}
