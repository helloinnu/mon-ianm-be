<?php

// app/Console/Commands/PingClients.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Client;
use App\Models\Connection;
use Carbon\Carbon;

class PingClients extends Command
{
    protected $signature = 'monitor:ping-clients';
    protected $description = 'Ping all clients and log their status';

    public function handle()
    {
        $clients = Client::where('status', 'active')->get();

        foreach ($clients as $client) {
            $ip = $client->ip_address;
            $output = null;
            $latency = null;
            $status = 'offline';

            // Ping 1x, timeout 2 detik
            exec("ping -c 1 -W 2 {$ip}", $output, $resultCode);

            if ($resultCode === 0) {
                $status = 'online';

                // Ambil latency dari hasil ping
                if (preg_match('/time=(\d+(\.\d+)?)/', implode("\n", $output), $matches)) {
                    $latency = round($matches[1]);
                }
            }

            Connection::create([
                'client_id' => $client->id,
                'status' => $status,
                'latency_ms' => $latency,
                'checked_at' => Carbon::now(),
            ]);

            $this->info("Client {$client->name} [$ip] is {$status} (latency: {$latency}ms)");
        }
    }
}

