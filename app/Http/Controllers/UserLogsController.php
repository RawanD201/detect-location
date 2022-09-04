<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stevebauman\Location\Facades\Location;
use Carbon\Carbon;

class UserLogsController extends Controller
{


    public function all(Request $request)
    {
        if ($request->user()->cannot('view', User::class)) {
            return back();
        }

        $date = $request->date ?: now()->toDateString();
        $logs = Log::with('user')->whereDate('created_at', '=', $date)->get();
        return view('logs.index', compact('logs', 'date'));
    }
}
