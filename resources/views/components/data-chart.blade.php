@props(['data'])

@php
    $labels = $data->pluck('created_at')
                   ->map(fn($date) => $date->format('Y-m-d H:i'))
                   ->toArray();

    $downloads = $data->pluck('download')
                      ->map(fn($value) => round($value / (1024 * 1024), 2))
                      ->toArray();

    $uploads = $data->pluck('upload')
                    ->map(fn($value) => round($value / (1024 * 1024), 2))
                    ->toArray();

    $pings = $data->pluck('ping')
                  ->map(fn($value) => round($value, 2))
                  ->toArray();
@endphp

<div class="mt-5 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('chartData', () => ({
                labels: @json($labels),
                downloadValues: @json($downloads),
                uploadValues: @json($uploads),
                pingValues: @json($pings),
                chart: null,

                init() {
                    const ctx = this.$refs.canvas.getContext('2d');
                    this.chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: this.labels,
                            datasets: [
                                {
                                    label: 'Download Speed (Mbps)',
                                    data: this.downloadValues,
                                    backgroundColor: 'rgba(119, 193, 210, 0.2)',
                                    borderColor: '#77C1D2',
                                    borderWidth: 2,
                                    fill: true,
                                },
                                {
                                    label: 'Upload Speed (Mbps)',
                                    data: this.uploadValues,
                                    backgroundColor: 'rgba(220, 53, 69, 0.2)',
                                    borderColor: '#DC3545',
                                    borderWidth: 2,
                                    fill: true,
                                },
                                {
                                    label: 'Ping (ms)',
                                    data: this.pingValues,
                                    backgroundColor: 'rgba(0, 123, 255, 0.2)',
                                    borderColor: '#007BFF',
                                    borderWidth: 2,
                                    fill: false,
                                    tension: 0.1,
                                },
                            ],
                        },
                        options: {
                            responsive: true,
                            interaction: { intersect: false },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: { display: true, text: 'Speed (Mbps) / Ping (ms)' },
                                },
                                x: {
                                    title: { display: true, text: 'Date' },
                                },
                            },
                            plugins: {
                                legend: { display: true },
                                tooltip: {
                                    displayColors: false,
                                    callbacks: {
                                        label: function (point) {
                                            // Adjust tooltip to handle different datasets (Download, Upload, Ping)
                                            if (point.dataset.label === 'Ping (ms)') {
                                                return `${point.dataset.label}: ${point.raw} ms`;
                                            } else {
                                                return `${point.dataset.label}: ${point.raw} Mbps`;
                                            }
                                        },
                                    },
                                },
                            },
                        },
                    });
                },
            }));
        });
    </script>

    <div
        x-data="chartData"
        x-init="init"
        class="w-full"
    >
        <canvas x-ref="canvas" class="rounded-lg shadow-2xl bg-white p-8"></canvas>
    </div>
</div>
