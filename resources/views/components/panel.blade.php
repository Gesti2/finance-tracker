@php
$classes = 'p-4 bg-white rounded-xl border border-transparent hover:border-gray-700 group transition-colors
duration-300';
@endphp

<div {{ $attributes(['class'=> $classes]) }}>
    {{ $slot }}
</div>