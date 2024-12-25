<?php

namespace App\Console\Commands;

use App\Models\Data;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class SpeedTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speedtest:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs the speedtest to gather data of your internet connection';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $process = new Process(['speedtest', '--json', '--secure']);

        $process->run();

        if (! $process->isSuccessful()) {
            $this->error('Speedtest Command failed.');

            return 1;
        }

        $output = $process->getOutput();
        $result = json_decode($output, true);

        Data::create([
            'download' => $result['download'],
            'upload' => $result['upload'],
            'ping' => $result['ping'],
            'server_lat' => $result['server']['lat'],
            'server_lon' => $result['server']['lon'],
            'server_name' => $result['server']['name'],
            'server_country' => $result['server']['country'],
            'server_id' => $result['server']['id'],
            'server_latency' => $result['server']['latency'],
            'timestamp' => $result['timestamp'],
            'bytes_sent' => $result['bytes_sent'],
            'bytes_received' => $result['bytes_received'],
            'client_ip' => $result['client']['ip'],
            'client_lat' => $result['client']['lat'],
            'client_lon' => $result['client']['lon'],
            'client_isp' => $result['client']['isp'],
            'client_country' => $result['client']['country'],
        ]);

        return 0;
    }
}
