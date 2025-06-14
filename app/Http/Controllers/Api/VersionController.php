<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;
use Throwable;

class VersionController extends Controller
{
    public function __invoke()
    {
        try {

            $version = Cache::remember('db_version', now()->addDays(1), function () {
                $result = DB::selectOne('SELECT version()');
                return $result->version ?? 'Unknown';
            });

            $data_source = 'redis';
        } catch (Throwable $e) {
            // Redis down atau gagal ping, fallback ke DB
            Log::warning('Redis cache failed: ' . $e->getMessage());

            $result = DB::selectOne('SELECT version()');
            $version = $result->version ?? 'Unknown';
            $data_source = 'database';
        }

        return response()->json([
            'database_version' => $version,
            'data_source' => $data_source
        ]);
    }
}
