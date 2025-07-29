@props([
    'id', // Unique modal ID
    'title' => 'Confirm Delete',
    'message' => 'Are you sure you want to delete this item? This action is irreversible.',
    'action', // Route or URL for the form submission
])

<!-- Trigger Button -->
<button type="button" class="btn btn-error" onclick="document.getElementById('{{ $id }}').showModal()">
    <i class="far fa-trash-alt"></i>
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
                @method('DELETE')
                <button type="submit" class="btn btn-error">Delete</button>
            </form>
        </div>
    </div>
</dialog>
