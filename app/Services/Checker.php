<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class Checker
{
    static function check($proxy) {
        try {
            $ip = Http::withOptions([
                'proxy' => 'http://' . $proxy->ip . ':' . $proxy->port
            ])->get('ipinfo.io/ip');
            $proxy->status = 1;
        } catch (\Throwable $e) {
            $proxy->status = -1;
        } finally {
            $proxy->save();
            return $proxy;
        }
    }
}
