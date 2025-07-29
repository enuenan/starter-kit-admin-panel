{{-- resources/views/components/table/view.blade.php --}}
<div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
    @php
        if ($collection instanceof \Illuminate\Support\Collection || is_array($collection) || $collection instanceof \Illuminate\Pagination\Paginator || $collection instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            $total_collection = count($collection);
        } elseif ($collection instanceof \Illuminate\Database\Eloquent\Model) {
            $total_collection = $collection->count();
        } else {
            $total_collection = 0;
        }
    @endphp
    <table class="table w-full dark:bg-base-100 {{ $total_collection > 0 ? 'min-w-4xl' : '' }}">
        @if ($headers && $total_collection > 0)
            <thead>
                <tr>
                    @foreach ($headers as $header)
                        <th class="text-black dark:text-white">{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>
        @endif

        <tbody>
            {{ $slot }}
        </tbody>

        @if ($footers && $total_collection > 0)
            <tfoot>
                <tr>
                    @foreach ($footers as $footer)
                        <th class="text-black dark:text-white">{{ $footer }}</th>
                    @endforeach
                </tr>
            </tfoot>
        @endif
    </table>

    @if ($collection instanceof \Illuminate\Pagination\Paginator || $collection instanceof \Illuminate\Pagination\LengthAwarePaginator)
        @if ($collection->hasPages())
            <x-table.paginate-view :collection="$collection" />
        @endif
    @endif

</div>