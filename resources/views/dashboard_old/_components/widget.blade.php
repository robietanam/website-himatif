<div
    class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 card-statistic-1">
    <div class="card-icon bg-{{ $color }}">
        <i class="{{ $icon }}"></i>
    </div>
    <div class="card-wrap">
        <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">
            <h4>{{ $title }}</h4>
        </div>
        <div class="flex-auto p-6">
            {{ $content }}
        </div>
    </div>
</div>
