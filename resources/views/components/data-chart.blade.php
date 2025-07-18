@props(['data'])

@php
    $sortedData = $data->sortBy('created_at');

    $labels = $sortedData->pluck('created_at')
                         ->map(fn($date) => $date->format('Y-m-d H:i'))
                         ->toArray();

    $downloads = $sortedData->pluck('download')
                            ->map(fn($value) => round($value, 2))
                            ->toArray();

    $uploads = $sortedData->pluck('upload')
                          ->map(fn($value) => round($value, 2))
                          ->toArray();

    $pings = $sortedData->pluck('ping')
                        ->map(fn($value) => round($value, 2))
                        ->toArray();

    $routes = $sortedData->pluck('id')
                         ->map(fn($id) => route('data.show', $id))
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
                routes: @json($routes),
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
                                    backgroundColor: 'rgba(198, 216, 211, 0.4)',
                                    borderColor: '#3F4896',
                                    borderWidth: 4,
                                    fill: true,
                                },
                                {
                                    label: 'Ping (ms)',
                                    data: this.pingValues,
                                    borderColor: '#CF553E',
                                    borderWidth: 4,
                                    fill: false,
                                    tension: 0.1,
                                },
                                {
                                    label: 'Upload Speed (Mbps)',
                                    data: this.uploadValues,
                                    backgroundColor: 'rgba(247, 153, 40, 0.2)',
                                    borderColor: '#F79928',
                                    borderWidth: 4,
                                    fill: true,
                                },
                            ],
                        },
                        options: {
                            responsive: true,
                            interaction: { intersect: false },
                            onClick: (event, elements) => {
                                if (elements.length > 0) {
                                    const index = elements[0].index;
                                    const route = this.routes[index];
                                    if (route) {
                                        window.location.href = route;
                                    }
                                }
                            },
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
        <canvas x-ref="canvas" class="rounded-xl shadow-2xl bg-white p-8"></canvas>
    </div>
</div>
