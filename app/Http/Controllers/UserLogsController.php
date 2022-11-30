<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Stevebauman\Location\Facades\Location;

class UserLogsController extends Controller
{


    public function all(Request $request)
    {
        if ($request->user()->cannot('view', User::class)) {
            return back();
        }

        $users = User::orderBy('name')->get();
        $startDate = $request->startDate ?: now()->toDateString();
        $endDate = $request->endDate ?: now()->toDateString();
        $user = $request->usr ?: null;
        $logs = Log::with('user')
            ->whereHas(
                'user',
                fn ($q) =>
                $user ? $q->where('username', $user) : $q
            )
            ->whereBetween(
                DB::raw('DATE(created_at)'),
                [$startDate, $endDate]
            )->paginate(9);
        return view('logs.index', compact('logs', 'startDate', 'endDate', 'users'));
    }
}
