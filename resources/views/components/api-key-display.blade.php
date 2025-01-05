<div>
    <h2 class="ubuntu-bold text-xl">API Key</h2>
    @if ($apiKey)
        <div class="api-key-box">
            <p>{{ $apiKey }}</p>
        </div>
    @else
        <p>Unable to load API key. Please check your connection.</p>
    @endif
</div>
