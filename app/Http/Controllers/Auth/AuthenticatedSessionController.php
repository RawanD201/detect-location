<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Storage;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

        $request->authenticate();

        $response = Http::acceptJson()->get('http://api.positionstack.com/v1/reverse', [
            'access_key' => config('services.geolocation'),
            'query' => "{$request->latitude},{$request->longitude}"
        ])->json('data')[0];


        $key = config('services.map');
        $lat = "{$request->longitude},{$request->latitude}";
        $url = "https://maps.geoapify.com/v1/staticmap?style=osm-carto&zoom=15&marker=lonlat:{$lat};type:material;color:%23ff3421;icontype:awesome&width=2140&height=1080&center=lonlat:{$lat}&apiKey={$key}";
        $imageContent = file_get_contents($url);
        $file = 'maps/' . md5($imageContent) . '.jpg';
        Storage::disk('public')->put($file, $imageContent);





        $log = $request->user()->logs()->create([
            'ip' => $request->ip(),
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'country' => $response['country'],
            'city' => $response['region'],
            'county' => $response['county'],
            'name' => $response['name'],
            'login_at' => \Carbon\Carbon::now(),
            'login_image' => $file
        ]);


        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {


        $key = config('services.map');
        $lat = "{$request->longitude},{$request->latitude}";
        $url = "https://maps.geoapify.com/v1/staticmap?style=osm-carto&zoom=15&marker=lonlat:{$lat};type:material;color:%23ff3421;icontype:awesome&width=2140&height=1080&center=lonlat:{$lat}&apiKey={$key}";
        $imageContent = file_get_contents($url);


        $file = 'maps/' . md5($imageContent) . '.jpg';
        Storage::disk('public')->put($file, $imageContent);

        $log = $request->user()->logs()->latest()->first();
        $log->update([
            'logout_at' => \Carbon\Carbon::now(),
            'logout_image' => $file
        ]);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
