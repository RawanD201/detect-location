<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Log;
use App\Models\User;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stevebauman\Location\Facades\Location;

class ReportLogsController extends Controller
{
    public function all(Request $request)
    {
        if ($request->user()->cannot('view', User::class)) {
            return back();
        }

        $date = $request->date ?: now()->toDateString();

        $users = User::with([
            'logs' => fn ($q) => $q->whereDate('created_at', $date)
        ])->get();

        $rows = [];
        $users->each(function ($user) use (&$rows) {

            $durationInSeconds = 0;
            $row = [];

            if (\count($user->logs) === 0)
                return;
            foreach ($user->logs as $log) {
                $logoutAt = $log->logout_at ? strtotime($log->logout_at)  : now()->timestamp;
                $loginAt = strtotime($log->login_at);
                $durationInSeconds +=  $logoutAt - $loginAt;
            }

            $durations = CarbonInterval::seconds($durationInSeconds)->cascade()->forHumans();
            $row['username'] = $user->username;
            $row['durations'] =  $durations;
            $rows[] = $row;
        });
        return view('report.index', compact('rows', 'date'));
    }
}
