@props(['message' => 'No Data'])

{{-- <svg width="80" height="80" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#808080">
    <path
        d="M20 15V5.5A1.5 1.5 0 0 0 18.5 4h-13A1.5 1.5 0 0 0 4 5.5V15h5.5a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 1.5 1.5h1a1.5 1.5 0 0 0 1.5-1.5.5.5 0 0 1 .5-.5zm0 1h-5.05a2.5 2.5 0 0 1-2.45 2h-1a2.5 2.5 0 0 1-2.45-2H4v2.5A1.5 1.5 0 0 0 5.5 20h13a1.5 1.5 0 0 0 1.5-1.5zM5.5 3h13A2.5 2.5 0 0 1 21 5.5v13a2.5 2.5 0 0 1-2.5 2.5h-13A2.5 2.5 0 0 1 3 18.5v-13A2.5 2.5 0 0 1 5.5 3" />
    <text x="50%" y="50%" fill="#808080" font-size="4" text-anchor="middle" dominant-baseline="middle">
        No Data
    </text>
</svg> --}}

<svg width="80" height="80" viewBox="0 0 24 30" xmlns="http://www.w3.org/2000/svg" fill="#808080" {!! $attributes->merge(['class' => '']) !!}>
    <path
        d="M20 15V5.5A1.5 1.5 0 0 0 18.5 4h-13A1.5 1.5 0 0 0 4 5.5V15h5.5a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 1.5 1.5h1a1.5 1.5 0 0 0 1.5-1.5.5.5 0 0 1 .5-.5zm0 1h-5.05a2.5 2.5 0 0 1-2.45 2h-1a2.5 2.5 0 0 1-2.45-2H4v2.5A1.5 1.5 0 0 0 5.5 20h13a1.5 1.5 0 0 0 1.5-1.5zM5.5 3h13A2.5 2.5 0 0 1 21 5.5v13a2.5 2.5 0 0 1-2.5 2.5h-13A2.5 2.5 0 0 1 3 18.5v-13A2.5 2.5 0 0 1 5.5 3" />
    <text x="50%" y="95%" fill="#808080" font-size="4" text-anchor="middle" dominant-baseline="middle">
        {{ $message }}
    </text>
</svg>