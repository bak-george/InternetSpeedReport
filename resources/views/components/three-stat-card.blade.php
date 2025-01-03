@props(['data', 'firstLabel', 'firstData', 'secondLabel', 'secondData', 'thirdLabel', 'thirdData'])
<div>
    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate ubuntu-bold text-gray-500">{{ $firstLabel }}</dt>
            <dd class="mt-1 text-3xl tracking-tight ubuntu-regular text-gray-900">{{ $firstData }}</dd>
        </div>
        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate ubuntu-bold text-gray-500">{{ $secondLabel }}</dt>
            <dd class="mt-1 text-3xl tracking-tight ubuntu-regular text-gray-900">{{ $secondData }}</dd>
        </div>
        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate ubuntu-bold text-gray-500">{{ $thirdLabel }}</dt>
            <dd class="mt-1 text-3xl tracking-tight ubuntu-regular text-gray-900">{{ $thirdData }}</dd>
        </div>
    </dl>
</div>
