<?php

namespace App\Console\Commands;

use App\Models\Data;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
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
        set_time_limit(120);
        $speedtestPath = env('SPEEDTEST_PATH', 'speedtest');

        $process = new Process([$speedtestPath, '--json', '--secure']);

        try {
            $process->run();

            if (!$process->isSuccessful()) {
                $errorOutput = $process->getErrorOutput() ?: 'Unknown error occurred.';
                $this->error('Speedtest Command failed: ' . $errorOutput);
                Log::error('Speedtest Command failed.', ['error' => $errorOutput]);
                return 1;
            }

            $output = $process->getOutput();
            $result = json_decode($output, true);

            if (!$result) {
                $this->error('Invalid JSON output from Speedtest.');
                Log::error('Speedtest failed: Invalid JSON.', [
                    'output' => $output,
                    'error' => json_last_error_msg()
                ]);
                return 1;
            }

            $name = ucfirst(fake()->words(3, true));

            $downloadMbps = convertToMegabytes($result['download']);
            $uploadMbps = convertToMegabytes($result['upload']);

            Data::create([
                'name' => $name,
                'download' => $downloadMbps,
                'upload' => $uploadMbps,
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
        } catch (\Exception $e) {
            $this->error('An unexpected error occurred: ' . $e->getMessage());
            Log::error('Speedtest Command Exception:', ['exception' => $e]);
            return 1;
        }
    }
}
