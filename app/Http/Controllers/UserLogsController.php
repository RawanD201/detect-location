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

        $user = $request->user ?: null;
        $logs = Log::with('user')
            ->whereHas(
                'user',
                fn ($q) =>
                $user ? $q->where('username', $user) : $q
            )
            ->whereDate('created_at', '=', $date)->get();
        return view('logs.index', compact('logs', 'date'));
    }
}
