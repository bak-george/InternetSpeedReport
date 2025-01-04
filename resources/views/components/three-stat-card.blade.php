@props(['data', 'firstLabel', 'firstData', 'secondLabel', 'secondData', 'thirdLabel', 'thirdData'])
<div>
    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="three-stat-header">{{ $firstLabel }}</dt>
            <dd class="three-stat-subheader">{{ $firstData }}</dd>
        </div>
        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="three-stat-header">{{ $secondLabel }}</dt>
            <dd class="three-stat-subheader">{{ $secondData }}</dd>
        </div>
        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="three-stat-header">{{ $thirdLabel }}</dt>
            <dd class="three-stat-subheader">{{ $thirdData }}</dd>
        </div>
    </dl>
</div>
