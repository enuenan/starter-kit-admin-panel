@props([
    'id', // Unique modal ID
    'title' => 'Confirm Restore',
    'message' => 'Are you sure you want to restore this item?',
    'action', // Route or URL for the form submission
])

<!-- Trigger Button -->
<button type="button" class="btn btn-warning" onclick="document.getElementById('{{ $id }}').showModal()">
    <i class="fa-sharp fa-solid fa-arrow-rotate-left"></i>
</button>

<!-- DaisyUI Modal -->
<dialog id="{{ $id }}" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">{{ $title }}</h3>
        <p class="py-4">{{ $message }}</p>
        <div class="modal-action">
            <button type="button" class="btn" onclick="document.getElementById('{{ $id }}').close()">Cancel</button>

            <form method="POST" action="{{ $action }}">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-warning">Restore</button>
            </form>
        </div>
    </div>
</dialog>
