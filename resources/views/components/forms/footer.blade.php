@props(['buttonText'])

<div class="flex">
    <a href="{{ url()->previous() }}" class="mr-2 btn btn-sm btn-warning">
        Back
    </a>
    <button class="btn btn-sm btn-primary" type="submit">{{ $buttonText }}</button>
</div>