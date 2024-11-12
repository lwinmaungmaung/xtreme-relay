<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class XtremeUIController extends Controller
{
    public function get(AuthenticationRequest $request)
    {
        try{

            $response = Http::get(config('app.BACKEND_SERVER').'/get.php', [
                'username' => $request->username,
                'password' => $request->password,
                'type' => $request->type,
                'action' => $request->action,
                'category_id' => $request->category_id,
                'vod_id' => $request->vod_id,
                'series' => $request->series,
                'stream_id' => $request->stream_id,
            ]);
            return $response->body();
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
        }
    }
    public function player_api(AuthenticationRequest $request){
        $response = Http::get(config('app.BACKEND_SERVER').'/player_api.php', [
            'username' => $request->username,
            'password' => $request->password,
            'action' => $request->action,
            'type' => $request->type,
            'category_id' => $request->category_id,
            'vod_id' => $request->vod_id,
            'series' => $request->series,
            'stream_id' => $request->stream_id,
        ]);
        return $response->json();
    }
    public function play($slug,$type){
        $response = Http::withoutRedirecting()->get(config('app.BACKEND_SERVER'). "/play/$slug/$type");
        return $response->header('location');
    }
    public function fallback(Request $request){
        $path =  $request->getRequestUri();
        $response = Http::withoutRedirecting()->get(config('app.BACKEND_SERVER').$path);
        return ($response->status() === 302) ? $response->header('location'): $response->body();
    }
}

