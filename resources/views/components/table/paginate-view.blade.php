@props(['collection' => null])

<div class="my-4 mx-2">
    {{ $collection?->links() }}
</div>