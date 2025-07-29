@props([
    'showSearch' => false,
    'searchValue' => '',
    'showSeeder' => false,
    'seederRoute' => null,
    'showCreate' => true,
    'createRoute' => null,
    'createLabel' => '',
    'showTrashedItem' => false,
    'showTrashedRoute' => '',
    'showAll' => false,
    'showAllRoute' => '',
])

<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-4">

    {{-- Search Form (optional) --}}
    @if ($showSearch)
        <form action="{{ url()->current() }}" method="GET" class="flex flex-wrap items-center gap-2">
            <input 
                type="text" 
                name="filter[search]" 
                placeholder="Search" 
                class="input input-bordered w-full sm:w-auto"
                value="{{ $searchValue }}"
            >
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    @else
        <div></div>
    @endif

    {{-- Buttons --}}
    <div class="flex flex-wrap justify-end items-center gap-2">
        {{-- Seeder Button --}}
        @if ($showSeeder && $seederRoute)
            <a href="{{ $seederRoute }}">
                <button class="btn btn-secondary">
                    Run Seeder
                </button>
            </a>
        @endif

        {{-- Create Button --}}
        @if ($showCreate && $createRoute)
            <a href="{{ $createRoute }}">
                <button class="btn btn-primary">
                    <i class="fa-solid fa-plus mr-2"></i> {{ $createLabel }}
                </button>
            </a>
        @endif
    </div>
</div>

<div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mb-4">
    @if ($showTrashedItem)
        <a href="{{ $showTrashedRoute }}">
            <button class="btn btn-primary btn-xs text-xs">
                Deleted
            </button>
        </a>
    @endif
    @if ($showAll)
        <a href="{{ $showAllRoute }}">
            <button class="btn btn-primary btn-xs text-xs">
                All
            </button>
        </a>
    @endif
</div>
